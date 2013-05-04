<?php 
  session_start(); 
  if (!isset($_SESSION['score']))
    $_SESSION['score'] = 0.0;
  if (isset($_GET['new_score']))
    $_SESSION['score'] = $_GET['new_score'];

  if (!isset($_SESSION['rounds']))
    $_SESSION['rounds'] = 0;
  else
    $_SESSION['rounds'] = $_SESSION['rounds'] + 1;


    //echo $_SESSION['rounds'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Who is?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css">
    <!--<link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/bootstrap-responsive.css">-->
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <!--[if lt IE 8]>
        <link rel="stylesheet" href="./css/font-awesome-ie7.min.css">    
    <![endif]-->
    <link rel="stylesheet" href="./css/style.css">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- The Game -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src='http://code.jquery.com/jquery-latest.min.js' type='text/javascript'></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="./js/common.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png"> -->
  </head>