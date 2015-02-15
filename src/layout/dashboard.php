<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/images/favicon.png">

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <?php include dirname(__FILE__) . '/include/navbar.php'; ?>

      <!-- Begin page content -->
      <div class="container">
        <?php if (isset($title)): ?>
          <div class="page-header">
            <h1><?php echo $title; ?></h1>
          </div>
        <?php endif; ?>

        <?php if (isset($content)): ?>
          <?php echo $content; ?>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Mes équipements</a></h3>
              </div>
              <div class="panel-body">
                <div class="row narrow">
                  <div class="col-sm-4 col-xs-6">
                    <div class="panel panel-default panel-small panel-hover">
                      <div class="panel-heading">Salle 1 - <em>sonde</em></div>
                      <div class="panel-body">
                        <span class="temperature"><?php echo floor($sensor->temperature); ?>.<sup>°C</sup><sub><?php echo round(($sensor->temperature - floor($sensor->temperature)) * 10); ?></sub></span>
                        <br/>
                        <?php echo round($sensor->pressure) . ' hPa'; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 col-xs-6">
                    <div class="panel panel-default panel-small panel-hover">
                      <div class="panel-heading">Chambre 1 - <em>sonde</em></div>
                      <div class="panel-body">
                        <span class="temperature"><?php echo floor($sensor->temperature); ?>.<sup>°C</sup><sub><?php echo round(($sensor->temperature - floor($sensor->temperature)) * 10); ?></sub></span>
                        <br/>
                        <?php echo round($sensor->pressure) . ' hPa'; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 col-xs-6">
                    <div class="panel panel-default panel-small panel-hover">
                      <div class="panel-heading">Chambre 2 - <em>sonde</em></div>
                      <div class="panel-body">
                        <span class="temperature"><?php echo floor($sensor->temperature); ?>.<sup>°C</sup><sub><?php echo round(($sensor->temperature - floor($sensor->temperature)) * 10); ?></sub></span>
                        <br/>
                        <?php echo round($sensor->pressure) . ' hPa'; ?>
                      </div>
                    </div>
                  </div>
                  <!--div class="col-md-3">
                    <div class="panel panel-default panel-small panel-float">
                      <div class="panel-body">
                        <div class="center-block">
                         <a href="#"><span class="glyphicon glyphicon-list-alt img-circle"></span><br/><span class="text">Ajouter</span></a>
                        </div>
                      </div>
                    </div>
                  </div-->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="#"><span class="glyphicon glyphicon-calendar"></span> Historique <span class="badge pull-right">14</span></a></h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <tbody>
                    <tr class="first">
                      <td class="status">&#149;</td>
                      <td class="date">25/12/2013<br/>20h40</td>
                      <td class="description">La centrale de votre site est installée.</td>
                    </tr>
                    <tr>
                      <td class="status">&#149;</td>
                      <td class="date">25/12/2013<br/>20h40</td>
                      <td class="description">La centrale de votre site est installée.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="#"><span class="glyphicon glyphicon-tasks"></span> Mes scénarios</a></h3>
              </div>
              <div class="panel-body">
                <div class="center-block">
                 <a href="#"><span class="glyphicon glyphicon-tasks img-circle"></span><br/><span class="text">Ajouter un scénario</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="#"><span class="glyphicon glyphicon-bell"></span> Mes alertes <span class="badge pull-right">4</span></a></h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <tbody>
                    <tr class="first">
                      <td class="status alert-success">&#149;</td>
                      <td class="date">25/12/2013<br/>20h40</td>
                      <td class="description">La centrale de votre site est installée.</td>
                    </tr>
                    <tr>
                      <td class="status alert-info">&#149;</td>
                      <td class="date">25/12/2013<br/>20h40</td>
                      <td class="description">La centrale de votre site est installée.</td>
                    </tr>
                    <tr>
                      <td class="status alert-warning">&#149;</td>
                      <td class="date">25/12/2013<br/>20h40</td>
                      <td class="description">La centrale de votre site est installée.</td>
                    </tr>
                    <tr>
                      <td class="status alert-danger">&#149;</td>
                      <td class="date">25/12/2013<br/>20h40</td>
                      <td class="description">La centrale de votre site est installée.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include dirname(__FILE__) . '/include/footer.php'; ?>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
