<?php

include 'dbh.php';
include 'header.php';

$id=$_GET['ID'];
$ruolo=$_GET['ruolo'];
$username=$_GET['username'];
$sql = "SELECT * FROM `Sql1062326_3`.`laboratorio` WHERE `ID`='".$id."'";
$result = mysql_query($sql);
$dataarray = array();
while ($row = mysql_fetch_assoc($result)){
	array_push($dataarray, $row);
}
if (isset($_POST['inserisci'])){
	$sql = "DELETE FROM `Sql1062326_3`.`laboratorio` WHERE `ID`='".$id."';";
	$result = mysql_query($sql);
	if (!$result) {
    die('Si è verificato un errore: ' . mysql_error());
}else{
	echo '<span style="color:#2db534;">Attrezzatura eliminata con successo!</span></br>';
	// redirect verso pagina interna
	$query=$_GET['lastquery'];
	header("refresh:0.5;url=./index.php?ruolo=".$ruolo."&lastquery=".$query."&username=".$username);
}}
?>
<body class ="body">
<label>In questa pagina &egrave; possibile eliminare l'attrezzatura selezionata:</label>
<form action="#" method="post">

<label>Modello:</label></br>
<?php echo $dataarray[0]['MODELLO'];?>
</br>
<label>Matricola:</label></br>
<?php echo $dataarray[0]['MATRICOLA'];?>
</br>
<label>Colore:</label></br>
<?php echo $dataarray[0]['COLORE'];?>
</br>
<label>Formato A4:</label></br>
<?php echo $dataarray[0]['A4'];?>
</br>
<label>Formato A3:</label></br>
<?php echo $dataarray[0]['A3'];?>
</br>
<label>Configurazione:</label></br>
<?php echo $dataarray[0]['CONFIGURAZIONE'];?>
</br>
<label>Provenienza:</label></br>
<?php echo rawurldecode($dataarray[0]['PROVENIENZA']);?>
</br>
<label>Contatore BK:</label></br>
<?php echo $dataarray[0]['CONTATOREBK'];?>
</br>
<?php
if($dataarray[0]['COLORE']=="CYMK"){
	echo "<label>Contatore CYMK:</label></br>".$dataarray[0]['CONTATORECYMK']."</br>";}
?>
<label>Condizione:</label></br>
<?php echo $dataarray[0]['CONDIZIONE'];?>
</br>
<label>Note:</label></br>
<?php echo rawurldecode($dataarray[0]['NOTE']);?>
<!--<textarea name="note" placeholder="Inserisci eventuali note aggiuntive sulla amcchina" rows="10" cols="30"></textarea>-->
</br>
<label><b>Attenzione, eliminare un record significa perdere i dati in maniera irreversibile. Si desidera continuare?</b></label></br>
<button type="submit" name="inserisci" id="cerca">Elimina record - sono consapevole dei rischi</button>
</form>
<?php $query=$_GET['lastquery']; echo"<a href=\"./index.php?lastquery=".$query."&ruolo=".$ruolo."&username=".$username."\"><button type=”submit”>Torna alla homepage senza cancellare record</button></a>";?>
</body>
</html>