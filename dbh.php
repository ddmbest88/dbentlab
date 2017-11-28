 <?php
$servername = "89.46.111.37";
$username = "Sql1062326";
$password = "og7uf71816";
$dbname ="Sql1062326_3";
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