<?php

include 'dbh.php';
include 'header.php';
$ruolo=$_GET['ruolo'];
$username=$_GET['username'];


if (isset($_POST['inserisci'])){
	$modello=strtoupper($_POST['modello']);
	$matricola=strtoupper($_POST['matricola']);
	$sql = "INSERT INTO `Sql1062326_3`.`laboratorio` ( `MODELLO`,`MATRICOLA`,`TIPOLOGIA`,`COLORE`,`A4`,`A3`,`CONFIGURAZIONE`, `PROVENIENZA`,`DESTINAZIONE`,`CONTATOREBK`,`CONTATORECYMK`,`CONDIZIONE`,`NOTE`) VALUES ('".$modello."', '".$matricola."','".$_POST['tipologia']."','".$_POST['colore']."','".$_POST['A4']."','".$_POST['A3']."', '".$_POST['configurazione']."','".rawurlencode($_POST['provenienza'])."','".rawurlencode($_POST['destinazione'])."','".$_POST['contatorebk']."','".$_POST['contatorecymk']."','".$_POST['condizione']."','".rawurlencode($_POST['note'])."');";
	$result = mysql_query($sql);
	if (!$result) {
    die('Si è verificato un errore: ' . mysql_error());
}else{
	echo '<span style="color:#2db534;">Attrezzatura inserita con successo!</span></br>';
	// redirect verso pagina interna
	header("refresh:0.5;url=./index.php?ruolo=".$ruolo."&username=".$username);
}}
?>
<body class ="body">
<label>In questa pagina &egrave; possibile aggiungere una nuova attrezzatura:</label>
<form action="#" method="post">

<label>Modello:</label></br>
<input type="text" name="modello" placeholder="Inserisci modello" value=""></input>
</br>
<label>Matricola:</label></br>
<input type="text" name="matricola" placeholder="Inserisci Matricola" value=""></input>
</br>
<label>Tipologia:</label>
</br>
<select name="tipologia" >
<option></option>
<option name="STAMPANTE">STAMPANTE</option>
<option name="MULTIFUNZIONE">MULTIFUNZIONE</option>
<option name="PLOTTER">PLOTTER</option>
</select>
</br>
<label>Colore:</label></br>
<select name="colore">
<option value="BK">Bianco e Nero</option>
<option value="CYMK">Quadricomia</option>
</select>
</br>
<label>Formato A4:</label></br>
<select name="A4">
<option value="SI">SI</option>
<option value="NO">NO</option>
</select>
</br>
<label>Formato A3:</label></br>
<select name="A3">
<option value="SI">SI</option>
<option value="NO">NO</option>
</select>
</br>
<label>Configurazione:</label></br>
<input type="text" name="configurazione" placeholder="Inserisci Configurazione" value=""></input>
</br>
<label>Provenienza:</label></br>
<input type="text" name="provenienza" placeholder="Inserisci Provenienza" value=""></input>
</br>
<label>Destinazione:</label></br>
<input type="text" name="destinazione" placeholder="Inserisci Destinanzione" value=""></input>
</br>
<label>Contatore BK:</label></br>
<input type="text" name="contatorebk" placeholder="Inserisci Contatore BK" value=""></input>
</br>
<label>Contatore CYMK:</label></br>
<input type="text" name="contatorecymk" placeholder="Inserisci Contatore CYMK" value=""></input>
</br>
<label>Condizione:</label></br>
<select name="condizione">
<option style="color:red" name="REVISIONARE" >REVISIONARE</option>
<option style="color:blue"name="REVISIONARE">REVISIONATA</option>
<option name="USO RICAMBI">CANNIBALIZZARE</option>
</select>
</br>
<label>Note:</label></br>
<textarea name="note" placeholder="Inserisci eventuali note aggiuntive sulla macchina" rows="10" cols="30"></textarea>
</br>
<button type="submit" name="inserisci" id="cerca">Inserisci Attrezzatura</button>
</form>
</body>
</html>