<?php session_start(); ?>
<!DOCTYPE html>
<head><title>PHP-FPM</title>
<meta http-equiv="refresh" content="10">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

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
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <?php
        echo "HTTP_X_FORWARDED_HOST: ". $_SERVER['HTTP_X_FORWARDED_HOST']."<br /><br />";
        echo "Webserver: ". $_SERVER['SERVER_ADDR']."<br />";
        echo "Server Software: ". $_SERVER['SERVER_SOFTWARE']."<br /><br />";
        echo "PHP-FPM host: ". $_SERVER['HOSTNAME']."<br />";
        echo "PHP version: ". $_ENV['PHP_VERSION']."<br />";
        $count = isset($_SESSION['count']) ? $_SESSION['count'] : 1;
        echo "Your session count on Redis ". $count;
        $_SESSION['count'] = ++$count;
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <img src="nginx-phpfpm_architecture.jpg" height="auto" width=100%>
      </div>
    </div>
  </div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
