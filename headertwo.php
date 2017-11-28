<?php
$ruolo=$_GET['ruolo'];
$username=$_GET['username'];
$href="./addreport.php?ruolo=";
?>
<html>
<head>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  $( function() {
    $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  <link href="css/main.css" rel="stylesheet">
</head>
<header class="header">
<p>Men&ugrave; Principale:<p/>
<table class="theader">
<td>
<?php echo"<a href=\"./index.php?username=".$username."&ruolo=".$_GET['ruolo']."\"> Lista Attrezzature </a>" ?>
</td>
<td>
<?php echo"<a href=\"./finaldestination.php?username=".$username."&ruolo=".$_GET['ruolo']."\"> Lista Destinazioni </a>" ?>
</td>
<!--<td>
<a href="./tecnici.php"> Gestisci Tecnici </a>
</td>-->
</table>
</header>
<?
?>