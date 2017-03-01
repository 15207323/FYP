<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.min.css" />
    <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'?>js/transition.min.js"></script>
    <script type="text/javascript" src="https://getbootstrap.com/2.0.4/assets/js/bootstrap-collapse.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css">

<script type="text/javascript">

    $('#eventStartTime,#eventEndTime').datetimepicker({
      useCurrent: false,
      minDate: moment()
    });
    $('#eventStartTime').datetimepicker().on('dp.change', function (e) {
      var incrementDay = moment(new Date(e.date));
      incrementDay.add(1, 'days');
      $('#eventEndTime').data('DateTimePicker').minDate(incrementDay);
      $(this).data("DateTimePicker").hide();
    });

    $('#eventEndTime').datetimepicker().on('dp.change', function (e) {
      var decrementDay = moment(new Date(e.date));
      decrementDay.subtract(1, 'days');
      $('#eventStartTime').data('DateTimePicker').maxDate(decrementDay);
      $(this).data("DateTimePicker").hide();
    });

</script>



<!--    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">-->




    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
