<?php

$ID = $_GET["IDTorneo"];
$status = $_GET["status"];

if($status==0){
  $status=1;
}else{
  $status=0;
}
$con = mysqli_connect('localhost','root',''); 		//stringa di connessione al db

mysqli_select_db($con, 'torneo_calcetto');

$ricevuta = mysqli_query($con,"UPDATE torneo SET attivo=".$status." WHERE ID=".$ID);
header("location:select-tournament.php");
?>