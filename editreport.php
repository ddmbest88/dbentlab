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
	$data=date("F j, Y, g:i a");
	$note=rawurlencode($_POST['note']);
	$sql = "UPDATE `Sql1062326_3`.`laboratorio` SET `MODELLO`='".$_POST['modello']."', `MATRICOLA`='".$_POST['matricola']."',`TIPOLOGIA`='".$_POST['tipologia']."',`COLORE`='".$_POST['colore']."',`A4`='".$_POST['A4']."',`A3`='".$_POST['A3']."', `CONFIGURAZIONE`='".rawurlencode($_POST['configurazione'])."', `PROVENIENZA`='".rawurlencode($_POST['provenienza'])."',`DESTINAZIONE`='".rawurlencode($_POST['destinazione'])."', `CONTATOREBK`='".$_POST['contatorebk']."', `CONTATORECYMK`='".$_POST['contatorecymk']."', `CONDIZIONE`='".$_POST['condizione']."', `NOTE`='-MODIFICATO DA ".$_GET['username']." IL ".$data."-".$note."' WHERE  `ID`='".$id."';";
	$result = mysql_query($sql);
	if (!$result) {
    die('Si è verificato un errore: ' . mysql_error());
}else{
	echo '<span style="color:#2db534;">Attrezzatura modificata con successo!</span></br>';
	// redirect verso pagina interna
	$query=$_GET['lastquery'];
	header("refresh:0.5;url=./index.php?ruolo=".$ruolo."&lastquery=".$query."&username=".$username);
}}
if (isset($_POST['inserisciesposta'])){
	$data=date("F j, Y, g:i a");
	$note=rawurlencode($_POST['note']);
	$sql = "INSERT INTO `Sql1062326_3`.`destinate` (`MODELLO`,`MATRICOLA`,`TIPOLOGIA`,`COLORE`,`A4`,`A3`, `CONFIGURAZIONE`, `PROVENIENZA`,`DESTINAZIONE`, `CONTATOREBK`, `CONTATORECYMK`, `CONDIZIONE`, `NOTE`) VALUES ('".$_POST['modello']."','".$_POST['matricola']."','".$_POST['tipologia']."','".$_POST['colore']."','".$_POST['A4']."','".$_POST['A3']."','".$_POST['configurazione']."','".rawurlencode($_POST['provenienza'])."','".rawurlencode($_POST['destinazione'])."', '".$_POST['contatorebk']."','".$_POST['contatorecymk']."','".$_POST['condizione']."','-MODIFICATO DA ".$_GET['username']." IL ".$data."-".$note."') ;";
	$result = mysql_query($sql);
	if (!$result) {
    die('Si è verificato un errore: ' . mysql_error());
}else{
		$sql4 = "DELETE FROM `Sql1062326_3`.`laboratorio` WHERE `ID`=".$id." LIMIT 1;";
		$result4=mysql_query($sql4);
		if (!$result) {
		die('Si è verificato un errore: ' . mysql_error());
		}else{
			echo '<span style="color:#2db534;">Attrezzatura modificata con successo!</span></br>';
	// redirect verso pagina interna
		$query=$_GET['lastquery'];
		header("refresh:0.5;url=./index.php?ruolo=".$ruolo."&lastquery=".$query."&username=".$username);}}}
		if (isset($_POST['tornaindietro'])){
			$query=$_GET['lastquery'];
			header("refresh:0.5;url=./index.php?ruolo=".$ruolo."&lastquery=".$query."&username=".$username);
	}
?>
<body class ="body">
<label>In questa pagina &egrave; possibile Modificare l'attrezzatura selezionata:</label>
<form action="#" method="post">

<label>Modello:</label></br>
<?php echo "<input type=\"text\" name=\"modello\" placeholder=\"Inserisci modello\" value=\"".$dataarray[0]['MODELLO']."\"></input>";?>
</br>
<label>Matricola:</label></br>
<?php echo "<input type=\"text\" name=\"matricola\" placeholder=\"Inserisci matricola\" value=\"".$dataarray[0]['MATRICOLA']."\"></input>";?>
</br>
<label>Tipologia</label>
</br>
<select name="tipologia" >
</br>
<?php
switch ($dataarray[0]['TIPOLOGIA']) {
    case "STAMPANTE":
        echo"<option value=\"STAMPANTE\">STAMPANTE</option>";
	echo "<option value=\"MULTIFUNZIONE\">MULTIFUNZIONE</option>";
	echo"<option value=\"PLOTTER\">PLOTTER</option>";
	echo "<option value=\"ALTRO\">ALTRO</option>";
        break;
    case "MULTIFUNZIONE":
        echo "<option value=\"MULTIFUNZIONE\">MULTIFUNZIONE</option>";
			echo"<option value=\"STAMPANTE\">STAMPANTE</option>";
			echo"<option value=\"PLOTTER\">PLOTTER</option>";
			echo "<option value=\"ALTRO\">ALTRO</option>";
        break;
    case "PLOTTER":
        echo"<option value=\"PLOTTER\">PLOTTER</option>";
			echo "<option value=\"MULTIFUNZIONE\">MULTIFUNZIONE</option>";
			echo"<option value=\"STAMPANTE\">STAMPANTE</option>";
			echo "<option value=\"ALTRO\">ALTRO</option>";
        break;
	case "ALTRO":
		echo "<option value=\"ALTRO\">ALTRO</option>";
		echo"<option value=\"PLOTTER\">PLOTTER</option>";
		echo "<option value=\"MULTIFUNZIONE\">MULTIFUNZIONE</option>";
		echo"<option value=\"STAMPANTE\">STAMPANTE</option>";
        break;
}				
		?>
</select>
</br>
<label>Colore:</label></br>
<select name="colore">
<?php
switch ($dataarray[0]['COLORE']) {
	case "BK":
        echo"<option value=\"BK\">Bianco e Nero</option>";
		echo "<option value=\"CYMK\">Quadricomia</option>";
        break;
	case "CYMK":
		echo "<option value=\"CYMK\">Quadricomia</option>";
        echo"<option value=\"BK\">Bianco e Nero</option>";
        break;
} 
		?>
</select>
</br>
<label>Formato A4:</label></br>
<select name="A4">
<?php if($dataarray[0]['A4']=="SI"){
	echo"<option value=\"SI\">SI</option>";
	echo "<option value=\"NO\">NO</option>"; 
	}else{
		echo "<option value=\"NO\">NO</option>";
		echo"<option value=\"SI\">SI</option>";} 
		?>
</select>
</br>
<label>Formato A3:</label></br>
<select name="A3">
<?php if($dataarray[0]['A3']=="SI"){
	echo"<option value=\"SI\">SI</option>";
	echo "<option value=\"NO\">NO</option>"; 
	}else{
		echo "<option value=\"NO\">NO</option>";
		echo"<option value=\"SI\">SI</option>";} 
		?>
</select>
</br>
<label>Configurazione:</label></br>
<?php echo "<input type=\"text\" name=\"configurazione\" placeholder=\"Inserisci configurazione\" value=\"".$dataarray[0]['CONDIZIONE']."\"></input>";?>
</br>
<label>Provenienza:</label></br>
<?php echo "<input type=\"text\" name=\"provenienza\" placeholder=\"Inserisci provenienza\" value=\"".rawurldecode($dataarray[0]['PROVENIENZA'])."\"></input>";?>
</br>
<label>Destinazione:</label></br>
<?php echo "<input type=\"text\" name=\"destinazione\" placeholder=\"Inserisci Destinazione\" value=\"".rawurldecode($dataarray[0]['DESTINAZIONE'])."\"></input>";?>
</br>
<label>Contatore BK:</label></br>
<?php echo "<input type=\"text\" name=\"contatorebk\" placeholder=\"Inserisci contatore Bianco e nero\" value=\"".$dataarray[0]['CONTATOREBK']."\"></input>";?>
</br>
<label>Contatore CYMK:</label></br>
<?php echo "<input type=\"text\" name=\"contatorecymk\" placeholder=\"Inserisci contatore colori\" value=\"".$dataarray[0]['CONTATORECYMK']."\"></input>";?>
</br>
<label>Condizione:</label></br>
<select name="condizione">
<option></option>
<option style="color:red" name="REVISIONARE" >REVISIONARE</option>
<option style="color:blue"name="REVISIONARE">REVISIONATA</option>
<option name="USO RICAMBI">CANNIBALIZZARE</option>
</select>
</br>
<label>Note:</label></br>
<?php echo "<textarea name=\"note\" rows=\"10\" cols=\"30\">".rawurldecode($dataarray[0]['NOTE'])."</textarea>";?>
<!--<textarea name="note" placeholder="Inserisci eventuali note aggiuntive sulla macchina" rows="10" cols="30"></textarea>-->
</br>
<button type="submit" name="inserisci" id="cerca">Termina Modifica</button>
<button type="submit" name="inserisciesposta" id="inserisciesposta">Termina Modifica e sposta in Destinate</button>
<button type="submit" name="tornaindietro" id="tornaindietro">Torna indietro senza salvare</button>
</form>
</body>
</html>