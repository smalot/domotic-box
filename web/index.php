<?php

include '../vendor/autoload.php';

require_once '../vendor/sofadesign/limonade/lib/limonade.php';

session_start();

/** @var PDO $db_connexion */
$db_connexion = null;

$user = null;

function configure()
{
    global $db_connexion;

    option('env', ENV_DEVELOPMENT);

    if (option('env') > ENV_PRODUCTION) {
        option('dsn', 'sqlite:db/development');
    } else {
        option('dsn', 'sqlite:db/production');
    }

    $db_connexion = new PDO(option('dsn'));
}

function before($route = array())
{
    header('X-LIM-route-function: ' . $route['callback']);
    //layout('html_default');

    #print_r($route); exit;
    #inspect the $route array, looking at various options that may have been passed in
    if (@$route['options']['authenticate']) {
        if (!authenticate_user()) {
            header('Location: /user/login');
            exit;
        }
    }

    if (@$route['options']['validation_function']) {
        call_if_exists($route['options']['validation_function'], params()) or halt("Woops! Params did not pass validation");
    }
}

function user_load($id) {
    global $db_connexion;

    $query = 'SELECT * FROM user WHERE user.id = :id';
    $statement = $db_connexion->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $user  = $db_connexion->exec($query);

    if (!$user = $statement->fetchObject()) {
        $user = null;
    }

    return $user;
}

function user_search($username, $password) {
    global $db_connexion;

    $query = 'SELECT * FROM user WHERE user.username = :username AND user.password = :password';
    $statement = $db_connexion->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->execute();

    if (!$user = $statement->fetchObject()) {
        $user = null;
    }

    return $user;
}

dispatch('/user/login', 'user_login');
function user_login() {
    // Check if user is already connected
    global $user;

    if (isset($_SESSION['user'])) {
        $user = user_load((int) $_SESSION['user']);
    }

    if ($user) {
        header('Location: /user/account');
    }

    return html_login(array());
}

dispatch('/user/logout', 'user_logout');
function user_logout() {
    unset($_SESSION['user']);
    session_destroy();

    header('Location: /user/login');
    exit;
}

dispatch_post('/user/login', 'user_login_post');
function user_login_post() {
    global $user;

    $user = user_search($_POST['username'], $_POST['password']);

    if ($user) {
        $_SESSION['user'] = $user->id;

        header('Location: /user/account');
    } else {
        header('Location: /user/login');
    }

    exit;
}

# able to pass options to routes, which are also available in the 'before' filter in the $route argument
dispatch('/user/account', 'user_account', array('authenticate' => TRUE));
function user_account() {
    return html_default(array());
}

run();

function authenticate_user() {
    global $user;

    if (isset($_SESSION['user'])) {
        $user = user_load((int) $_SESSION['user']);
    }

    if ($user) {
        return true;
    } else {
        return false;
    }
}

function after($output, $route)
{
    $time = number_format( microtime(true) - LIM_START_MICROTIME, 6);
    $output .= "\n<!-- page rendered in $time sec., on ".date(DATE_RFC822)." -->\n";
    $output .= "<!-- for route\n";
    $output .= print_r($route, true);
    $output .= "-->";
    return $output;
}

function html_login($vars) {
    extract($vars);
    
    include '../src/layout/login.php';
}

function html_default($vars) {
    extract($vars);
    global $user;

    include '../src/layout/default.php';
}
