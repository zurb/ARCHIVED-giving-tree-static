<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <? date_default_timezone_set('UTC'); ?>
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <!-- For third-generation iPad with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/favicons/apple-touch-icon-144x144-precomposed.png">
  <!-- For iPhone with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/favicons/apple-touch-icon-114x114-precomposed.png">
  <!-- For first- and second-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/favicons/apple-touch-icon-72x72-precomposed.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="images/favicons/apple-touch-icon-precomposed.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->

  <link rel="icon" href="images/favicons/favicon.ico" type="image/x-icon" />

  <meta name="keywords" content="keywords" />
  <meta name="description" content="description" />
  <meta name="author" content="family giving tree" />
  <meta name="copyright" content="Family Giving Tree, inc. Copyright (c) <? date("Y") ?>" />

  <title>Family Giving Tree: <?= $page_title ?></title>

  <!-- Included CSS Files -->
  <link rel="stylesheet" href="stylesheets/app.css">


  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body class="<?= $page_template ?>">

<header>
    <div class="row">
        <div class="twelve columns">
            <a href="donate.php" class="medium button right">Donate</a>
        </div>
    </div>
    <!-- end .row -->
    <div class="row">
        <div class="three columns">
            <a href="index.php"><img src="images/logo.png" alt="Family Giving Tree"></a>
        </div>
        <nav class="nine columns">
            <ul class="link-list">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="who-we-help.php">Who We Help</a></li>
                <li><a href="lead-a-drive.php">Lead a Drive</a></li>
                <li><a href="sponsor.php">Sponsors</a></li>
                <li><a href="volunteer.php">Volunteer</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </div>
    <!-- end .row -->
</header>

<?php include("includes/_functions.php"); ?>