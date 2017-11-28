<?php
$ruolo=$_GET['ruolo'];
$username=$_GET['username'];
$href="./addreport.php?ruolo=";
$query=$_GET['lastquery'];
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
<?php echo"<a href=\"./index.php?ruolo=".$_GET['ruolo']."&lastquery=".$query."&username=".$username."\"> Lista Attrezzature </a>" ?>
</td>
<td>
<?php if($ruolo=$_GET['ruolo']!=""&&$ruolo=$_GET['ruolo']=="administrator"){ echo"<a href=\"".$href.$ruolo."&username=".$username."\"> Inserisci Attrezzatura </a>";}?>
</td>
<!--<td>
<a href="./tecnici.php"> Gestisci Tecnici </a>
</td>-->
</table>
</header>
<?
?>