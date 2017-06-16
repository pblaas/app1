<?php session_start(); ?>
<!DOCTYPE html>
<head><title>PHP-FPM</title>
<meta http-equiv="refresh" content="20">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>

    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PHP-FPM Microservices - CI/CD Demo</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div style="background: white;">
    <div class="container">
    <div class="row">
      <div class="col-md-8">
        <?php
        echo "<h2> HTTP_X_FORWARDED_HOST: ". $_SERVER['HTTP_X_FORWARDED_HOST']."</h2><br /><br />";
        #echo "Webserver: ". $_SERVER['SERVER_ADDR']."<br />";
        #echo "Server Software: ". $_SERVER['SERVER_SOFTWARE']."<br /><br />";
        #echo "PHP-FPM host: ". $_SERVER['HOSTNAME']."<br />";
        #echo "PHP version: ". $_ENV['PHP_VERSION']."<br />";
        $count = isset($_SESSION['count']) ? $_SESSION['count'] : 1;
        $server_addr="web_".$_SERVER['SERVER_ADDR'];
        $php_host="php_".$_SERVER['HOSTNAME'];
        isset($_SESSION[$server_addr]) ? $_SESSION[$server_addr] : 1;
        isset($_SESSION[$php_host]) ? $_SESSION[$php_host] : 1;
        #echo "Your session count on Redis ". $count ."<br />";
        $_SESSION['count'] = ++$count;
        $_SESSION[$server_addr] += 1;
        $_SESSION[$php_host] += 1;
        #echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        $webarray = array();
        $phparray = array();

        foreach ($_SESSION as $key => $value) {
          if (preg_match('/web/', $key)) {
            $webarray[$key] = $value;
          }
        }

        foreach ($_SESSION as $key => $value) {
          if (preg_match('/php/', $key)) {
            $phparray[$key] = $value;
          }
        }

        echo '<div class="row">';
        echo '<h3>Webservers</h3>';
        foreach ($webarray as $key => $value) {
          echo '<div class="col-md-3">';
          if (preg_match('/web/', $key)) {
            echo '<div class="alert alert-success" role="alert">'. trim($key, "web_") . '  <span class="badge">' . $value.'</span></div>';
          }
          echo '</div>';
        }
        echo '</div>';

        echo '<div class="row">';
        echo '<h3>PHP Interpreters</h3>';
        foreach ($phparray as $key => $value) {
          echo '<div class="col-md-3">';
          if (preg_match('/php/', $key)) {
            echo '<div class="alert alert-success" role="alert">'. trim($key, "php_") . '  <span class="badge">' . $value.'</span></div>';
          }
          echo '</div>';
        }
        echo '</div>';

        echo '<div class="row">';
        echo '<h3>Redis Session counter</h3>';
        echo '<div class="col-md-3">';
        echo '<div class="alert alert-success" role="alert">Session # <span class="badge">' . $count.'</span></div>';
        echo '</div>';
        echo '</div>';

        ?>
      </div>
    </div>
    <div class="row">
      <img src="containership_2.jpg">
    </div>
  </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>
