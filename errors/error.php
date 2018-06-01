<?php
$error_code = $_GET['code'];
$error_message = $_GET['message'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $error_code; ?> - <?php echo $error_message; ?> | Michael Barrows | Full Stack Web Developer in Colchester, Essex.</title>
    <meta name="theme-color" content="#0099CC">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="icon" href="/img/favicon.png">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-89047400-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-89047400-1');
    </script>

  </head>
  <body>
    <header id="project">
      <a href="/"><img src="/img/logo.png" alt=""></a>
      <h1><?php echo $error_code; ?> - <?php echo $error_message; ?></h1>
    </header>
    <section id="project">
      <p>That's an error</p>
      <br><br>
      <div class="button" style="max-width: 30%; margin: auto;">
        <a href="/"><span class="fa fa-arrow-circle-left left"></span> Go Home</a>
      </div>
    </section>
    <footer style="position: absolute; bottom: 0; left: 0; width: 100%;">
      <div class="container">
        <div class="social">
          <a href="mailto:contact@michaelbarrows.co.uk" target="_blank"><span class="fa fa-envelope"></span></a>
          <a href="https://twitter.com/michaelbarrows_" target="_blank"><span class="fa fa-twitter"></span></a>
          <a href="https://www.linkedin.com/in/michaelpbarrows/" target="_blank"><span class="fa fa-linkedin"></span></a>
          <a href="https://github.com/MichaelBarrows" target="_blank"><span class="fa fa-github"></span></a>
        </div>
        <img src="/img/logo.png" alt="">
        <p>&copy; Michael Barrows 2018</p>
      </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
