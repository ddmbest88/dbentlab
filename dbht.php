<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="rapportini";
$conn = new mysqli($servername, $username, $password, $dbname);

if(!mysql_connect($servername,$username,$password))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db($dbname))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>