<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/'?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="<?php echo base_url().'assets/'?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'assets/'?>css/animate.css" rel="stylesheet">
    <!-- Squad theme CSS -->
    <link href="<?php echo base_url().'assets/'?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/'?>color/default.css" rel="stylesheet">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css">
    <!-- JQuery UI CSS -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
    $bg = array('back1.jpg', 'back2.jpg', 'back3.jpg', 'back4.jpg', 'back5.jpg' ); // array of filenames

    $i = rand(0, count($bg)-1); // generate random number size of the array
    $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
    ?>

  </head>
  <style type="text/css">

    body{
      background: url(<?php echo base_url().'assets/images/backgroundimage/'?><?php echo $selectedBg; ?>) no-repeat center center fixed;
      background-size: cover;
    }

  </style>
