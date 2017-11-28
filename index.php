<?php

include 'dbh.php';
$href="./addreport.php?ruolo=";
$hrefb="&username=";
$hreftwo="./finaldestination.php?ruolo=";
$hreftwob="&username=";
$ruolo=$_GET['ruolo'];
$username=$_GET['username'];
$tableheader="<table class=".$class."><tr><th >Modello<br></th><th >Matricola</th><th >Tipologia</th><th >Colore</th><th >Formato A4</th><th >Formato A3</th><th >Configurazione</th><th >Contatore BK</th><th >Contatore CYMK</th><th >Provenienza</th><th >Destinazione</th><th >Condizione </th><th >Note</th></tr>";
echo "Modo: ".$ruolo."\r\n.";
echo "Username: ".$username."\r\n.";
echo "Versione 1.1.2-RC"; 
$data="";
if(isset($_GET['datidacercare'])){
	$data = $_GET['datidacercare'];
}


?>
<html>
<head>
<meta charset="UTF-8">
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
<?php if($ruolo=$_GET['ruolo']!=""&&$ruolo=$_GET['ruolo']=="administrator"||$ruolo=$_GET['ruolo']=="generalmanager"||$ruolo=$_GET['ruolo']=="amministratoreunico"||$ruolo=$_GET['ruolo']=="supervisore"){ echo"<a href=\"".$href.$_GET['ruolo'].$hrefb.$_GET['username']."\"> Inserisci Attrezzatura </a>";}?>
</td>
<td>
<?php if($ruolo=$_GET['ruolo']!=""&&$ruolo=$_GET['ruolo']=="administrator"||$ruolo=$_GET['ruolo']=="generalmanager"||$ruolo=$_GET['ruolo']=="amministratoreunico"||$ruolo=$_GET['ruolo']=="supervisore"){ echo"<a href=\"".$hreftwo.$_GET['ruolo'].$hreftwob.$_GET['username']."\"> Vai a Macchine Destinate </a>";}?>
</td>
<!--<td>
<a href="./tecnici.php"> Gestisci Tecnici </a>
</td>-->
</table>
</header>
<body class="body">
</br>
<label>Ricerca Attrezzatura<label>
<label>in questa pagina &egrave; possibile ricercare attrezzature secondo determinati criteri di ricerca.</label>
<h3>Ricerca Attrezzatura per:</h3>

<div class="pricipalmenu">
	<form action="#" method="post">
</div>
<p>Filtri possibili di Ricerca:</p>
<!--<form action="" method="post">--><label>Modello</label></br><!--<button type="submit" name="multiple">Selezione Multipla</button></form></br>-->
<?if(isset($_GET['datidacercare'])){
	$modelli=$_GET['datidacercare'];
	echo"<input type=\"text\" name=\"modello\" value=\"".$modelli."\" placeholder=\"Inserisci un modello\"></input></br>";
}else{echo "<input type=\"text\" name=\"modello\" value=\"\" placeholder=\"Inserisci un modello\"></input></br>";}?>
<label>Tipologia</label></br>
<select name="tipologia" >
<option></option>
<option name="STAMPANTE">STAMPANTE</option>
<option name="MULTIFUNZIONE">MULTIFUNZIONE</option>
<option name="PLOTTER">PLOTTER</option>
<option name="ALTRO">ALTRO</option>
</select>
</br>
<label>Matricola</label></br>
<input type="text" name="matricola" value=""></input>
</br>
<label>Formato</label></br>
<select name="formato" >
<option></option>
<option name="A4">A4</option>
<option name="A3">A3</option>
<option name="A4A3">A4/A3</option>
</select></br>
<label>Colore</label></br>
<select name="colore" >
<option></option>
<option name="BK">BK</option>
<option name="CYMK">CYMK</option>
</select>
</br>
<label>Condizione</label></br>
<select name="condizione" >
<option></option>
<option style="color:red" name="REVISIONARE" >REVISIONARE</option>
<option style="color:blue"name="REVISIONARE">REVISIONATA</option>
<option name="USO RICAMBI">CANNIBALIZZARE</option>
</select></br>
</br>
</br>
<button type="submit" name="cerca" id="cerca">Avvia Ricerca</button><button type="submit" name="multiple">Selezione Multipla</button>
</form>
</body>
</html>

<?php
$class="table";
$modello="";
$tipologia="";
$formato="";
$colore="";
$condizione="";
$matricola="";
$tableheader="<table class=".$class."><tr><th >Modello<br></th><th >Matricola</th><th >Tipologia</th><th >Colore</th><th >Formato A4</th><th >Formato A3</th><th >Configurazione</th><th >Contatore BK</th><th >Contatore CYMK</th><th >Provenienza</th><th >Condizione </th><th >Note</th></tr>";
if (isset($_POST['cerca'])){
	
	echo $_POST['colore'];
	$passaruolo=$ruolo;
	if(isset($_POST['modello'])){
		if($_POST['modello']!=""){
			if(isset($_GET['datidacercare'])){
			$pieces = explode("-", $modelli);
			for($i=0;$i<count($pieces);$i++){
			if($i==0){$modello="`MODELLO`='".$pieces[$i]."'";}
				else{$modello=$modello." OR `MODELLO`='".$pieces[$i]."'";}
				}
			}else{$modello="`MODELLO` LIKE '%".$_POST['modello']."%'";}}}
	if(isset($_POST['tipologia'])){if($_POST['tipologia']!=""){if($modello!=""){$tipologia="AND `TIPOLOGIA`= '".$_POST['tipologia']."'";}else{$tipologia=" `TIPOLOGIA`='".$_POST['tipologia']."'";}}}		
	if(isset($_POST['formato'])){if($_POST['formato']!=""){if($_POST['formato']=="A4"){if($modello!=""||$tipologia!=""){$formato=" AND `A4`='SI' AND `A3`='NO'";}else{$formato="`A4`='SI' AND `A3`='NO'";}}if($_POST['formato']=="A3"){if($modello!=""||$tipologia!=""){$formato=" AND `A3`='SI' AND `A4`='NO'";}else{$formato="`A3`='SI' AND `A4`='NO'";}}if($_POST['formato']=="A4/A3"){if($modello!=""||$tipologia!=""){$formato=" AND `A4`='SI' AND `A3`='SI'";}else{$formato="`A4`='SI' AND `A3`='SI'";}}}}
	//if(isset($_POST['contatore'])){if($_POST['contatore']!=""){if($modello!=""||$matricola!=""){$contatore="AND `CONTATOREBK` LIKE '%".$_POST['contatore']."%'";}else{$contatore=" `CONTATOREBK` LIKE '%".$_POST['contatore']."%'";}}}
	if(isset($_POST['colore'])){if($_POST['colore']!=""){if($_POST['colore']=="BK"){if($modello!=""||$tipologia!=""||$formato!=""){$colore="AND `COLORE`='BK'";}else{$colore=" `COLORE`='BK'";}}if($_POST['colore']=="CYMK"){if($modello!=""||$tipologia!=""||$formato!=""){$colore="AND `COLORE`='CYMK'";}else{$colore=" `COLORE`='CYMK'";}}}}
	//if($modello!=""||$matricola!=""){$contatore="AND `CONTATOREBK` LIKE '%".$_POST['contatore']."%'";}else{$contatore=" `CONTATOREBK` LIKE '%".$_POST['contatore']."%'";}
	if(isset($_POST['condizione'])){if($_POST['condizione']!=""){if($modello!=""||$tipologia!=""||$formato!=""||$colore!=""){$condizione="AND `CONDIZIONE`= '".$_POST['condizione']."'";}else{$condizione=" `CONDIZIONE`='".$_POST['condizione']."'";}}}
	if(isset($_POST['matricola'])){if($_POST['matricola']!=""){if($modello!=""||$tipologia!=""||$formato!=""||$colore!=""||$condizione!=""){$matricola="AND `MATRICOLA` LIKE '%".$_POST['matricola']."%'";}else{$matricola=" `MATRICOLA`LIKE '%".$_POST['matricola']."%'";}}}
	//if($modello==""){ echo "\"Modello\" &egrave; un campo obbligatorio!";}
	//else{
		if($modello==""&&$formato==""&&$colore==""&&$condizione==""&&$tipologia==""&&$matricola==""){$sql = "SELECT * FROM `Sql1062326_3`.`laboratorio`;";}
		else{$sql = "SELECT * FROM `Sql1062326_3`.`laboratorio` WHERE  ".$modello." ".$tipologia." ".$formato." ".$colore." ".$condizione." ".$matricola." ;";}
		echo "Query eseguita: ".$sql;
		$querydapassare=$sql;
		 $query= rawurlencode ($querydapassare);
		 echo $_SESSION['lastquery'];
		//echo	"Query da passare ".$querydapassare;
		$result = mysql_query($sql);
		echo "</br><label>Risultati Ricerca:</label>";
		echo $tableheader;
			while($userRow=mysql_fetch_array($result)){ 
			echo"<tr>";
			echo"<td >".$userRow['MODELLO']." </td>";
			echo"<td >".$userRow['MATRICOLA']." </td>";
			echo"<td >".$userRow['TIPOLOGIA']." </td>";
			echo"<td >".$userRow['COLORE']." </td>";
			echo"<td >".$userRow['A4']." </td>";
			echo"<td >".$userRow['A3']." </td>";
			echo"<td >".$userRow['CONFIGURAZIONE']." </td>";
			echo"<td >".$userRow['CONTATOREBK']." </td>";
			echo"<td >".$userRow['CONTATORECYMK']." </td>";
			echo"<td >".rawurldecode($userRow['PROVENIENZA'])." </td>";
			//echo"<td >".$userRow['DESTINAZIONE']." </td>";
			echo"<td >".$userRow['CONDIZIONE']." </td>";
			$note=rawurldecode($userRow['NOTE']);
			echo"<td >".$note." </td>";
			echo"<td ><a href=./convertfpdf.php?ID=".$userRow['ID']." target=”popup”><button type=”submit”>Apri Scheda</button></form></td>";
			if($ruolo=!""&&$ruolo=="administrator"||$ruolo=="generalmanager"||$ruolo=="amministratoreunico"||$ruolo=="supervisore"){echo"<td ><a href=./editreport.php?ID=".$userRow['ID']."&ruolo=".$_GET['ruolo']."&lastquery=".$query."&username=".$_GET['username']." ><button type=”submit”>Modifica Record</button></form></td>";}
			if($ruolo=!""&&$ruolo=="administrator"||$ruolo=="generalmanager"||$ruolo=="amministratoreunico"||$ruolo=="supervisore"){echo"<td ><a href=./deletereport.php?ID=".$userRow['ID']."&ruolo=".$_GET['ruolo']."&lastquery=".$query."&username=".$_GET['username']." ><button type=”submit”>Elimina Record</button></form></td>";}
			if($ruolo=!""&&$ruolo=="administrator"||$ruolo=="generalmanager"||$ruolo=="amministratoreunico"||$ruolo=="supervisore"){echo"<td ><a href=./index.php?ID=".$userRow['ID']."&ruolo=".$_GET['ruolo']."&azione=sposta&lastquery=".$query."&username=".$_GET['username']." ><button type=”submit”>Sposta Record</button></form></td>";}
			echo"</tr>";
			 
			}
		echo "<table>";}else{if(isset($_POST['multiple'])){$passaruolo=$ruolo;header("refresh:1;url=./query.php?ruolo=".$_GET['ruolo']."&username=".$_GET['username']);}}

		if(isset($_GET['ID'])&& $_GET['azione']=="sposta"){
		if($_GET['ruolo']=="administrator"||$_GET['ruolo']=="amministratoreunico"||$_GET['ruolo']=="supervisore"||$_GET['ruolo']=="generalmanager"){
		$id=$_GET['ID'];
		$sql3 = "SELECT * FROM `Sql1062326_3`.`laboratorio` WHERE `ID`=".$id." LIMIT 1;";
		$result3=mysql_query($sql3);
		while($userRow=mysql_fetch_array($result3)){
		$sql = "INSERT INTO `Sql1062326_3`.`destinate` (`MODELLO`,`MATRICOLA`,`TIPOLOGIA`,`COLORE`,`A4`,`A3`,`CONFIGURAZIONE`, `PROVENIENZA`,`DESTINAZIONE`,`CONTATOREBK`,`CONTATORECYMK`,`CONDIZIONE`,`NOTE`) VALUES ('".$userRow['MODELLO']."', '".$userRow['MATRICOLA']."','".$userRow['TIPOLOGIA']."','".$userRow['COLORE']."','".$userRow['A4']."','".$userRow['A3']."', '".$userRow['CONFIGURAZIONE']."','".$userRow['PROVENIENZA']."','".$userRow['DESTINAZIONE']."','".$userRow['CONTATOREBK']."','".$userRow['CONTATORECYMK']."','".$userRow['CONDIZIONE']."','".$userRow['NOTE']."');";
		$result = mysql_query($sql);
		}
		$sql4 = "DELETE FROM `Sql1062326_3`.`laboratorio` WHERE `ID`=".$id." LIMIT 1;";
		$result4=mysql_query($sql4);
		echo "<span style=\"color:#2db534;\">Record numero ".$_GET['ID']." Spostato in Macchine destinate!</'span>";
		}}

		//far partire in qualche modo la ricerca grabbando la query
		if(!isset($_POST['cerca'])){
		if (isset($_GET['lastquery'])){
			$query= rawurldecode($_GET['lastquery']);
		echo "Query eseguita: ".$query;
		$result = mysql_query($query);
		$query=rawurlencode($query);
		echo "</br><label>Risultati Ricerca:</label>";
		echo $tableheader;
			while($userRow=mysql_fetch_array($result)){ 
			echo"<tr>";
			echo"<td >".$userRow['MODELLO']." </td>";
			echo"<td >".$userRow['MATRICOLA']." </td>";
			echo"<td >".$userRow['TIPOLOGIA']." </td>";
			echo"<td >".$userRow['COLORE']." </td>";
			echo"<td >".$userRow['A4']." </td>";
			echo"<td >".$userRow['A3']." </td>";
			echo"<td >".$userRow['CONFIGURAZIONE']." </td>";
			echo"<td >".$userRow['CONTATOREBK']." </td>";
			echo"<td >".$userRow['CONTATORECYMK']." </td>";
			echo"<td >".rawurldecode($userRow['PROVENIENZA'])." </td>";
			echo"<td >".rawurldecode($userRow['DESTINAZIONE'])." </td>";
			echo"<td >".$userRow['CONDIZIONE']." </td>";
			$note=rawurldecode($userRow['NOTE']);
			echo"<td >".$note." </td>";
			echo"<td ><a href=./convertfpdf.php?ID=".$userRow['ID']." target=”popup”><button type=”submit”>Apri Scheda</button></form></td>";
			if($ruolo=!""&&$ruolo=="administrator"||$ruolo=="generalmanager"||$ruolo=="amministratoreunico"||$ruolo=="supervisore"){echo"<td ><a href=./editreport.php?ID=".$userRow['ID']."&ruolo=".$_GET['ruolo']."&lastquery=".$query."&username=".$_GET['username']." ><button type=”submit”>Modifica Record</button></form></td>";}
			if($ruolo=!""&&$ruolo=="administrator"||$ruolo=="generalmanager"||$ruolo=="amministratoreunico"||$ruolo=="supervisore"){echo"<td ><a href=./deletereport.php?ID=".$userRow['ID']."&ruolo=".$_GET['ruolo']."&lastquery=".$query."&username=".$_GET['username']." ><button type=”submit”>Elimina Record</button></form></td>";}
			if($ruolo=!""&&$ruolo=="administrator"||$ruolo=="generalmanager"||$ruolo=="amministratoreunico"||$ruolo=="supervisore"){echo"<td ><a href=./index.php?ID=".$userRow['ID']."&ruolo=".$_GET['ruolo']."&azione=sposta&lastquery=".$query."&username=".$_GET['username']." ><button type=”submit”>Sposta Record</button></form></td>";}
			echo"</tr>";
		}}}
	//echo "Vai semp";
?>
