<?php
include 'dbh.php';
include 'header.php';


$ruolo=$_GET['ruolo'];
$sql = "SELECT modello FROM laboratorio GROUP BY modello HAVING count(*) >= 1;";
$result = mysql_query($sql);
$dataarray = array();

while ($row = mysql_fetch_assoc($result)){
	array_push($dataarray, $row['modello']);
}
$arraydapassare="";
if(isset($_POST['send_data'])){
	$amount=count($dataarray);
for($k=0;$k<count($dataarray);$k++){
	if(isset($_POST['checklist'.$k])){
		//echo $_POST['checklist'.$k];
		if($k==0){
		$arraydapassare=$_POST['checklist'.$k]."-";}else{
			if($k<=$amount-1){$arraydapassare=$arraydapassare."".$_POST['checklist'.$k]."-";}else{
				if($k>=$amount){$arraydapassare=$arraydapassare."".$_POST['checklist'.$k];}}}}}


//print_r($arraydapassare);//sperem}
$data = rtrim($arraydapassare,'-');
echo "Selezione avvenuta con successo, torno a indice!";
header("refresh:0.5;url=./index.php?datidacercare=".$data."&ruolo=".$ruolo);	
}else{
	if(isset($_POST['back'])){
		header("refresh:1;url=./index.php");
	}
}
	

//print_r($dataarray);
?><pre><form action="#" method="post">
<label class="heading">Seleziona le macchine da ricercare:</label></br><?
for($i=0;$i<count($dataarray);$i++){
echo "<input type=\"checkbox\" name=\"checklist".$i."\" value=\"".$dataarray[$i]."\"><label>".$dataarray[$i]."</label></br>";
}
?><input type="submit" name="send_data" Value="Submit"/>
</form><button type="submit" name="back">Torna indietro</button></pre><?

?>
