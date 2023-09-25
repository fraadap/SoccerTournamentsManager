<?php

$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$username=$_POST['username'];
$password=$_POST['password'];
$nomeSquadra=$_POST['nomeSquadra'];
$logo=$_FILES['logo']['name'];

$ImageName = $_FILES['logo']['name'];
$fileElementName = 'photo';
$path = 'IMG/'; 
$location = $path . $_FILES['logo']['name']; 
move_uploaded_file($_FILES['logo']['tmp_name'], $location); 



$con = mysqli_connect('localhost','root',''); 		//stringa di connessione al db

mysqli_select_db($con, 'torneo_calcetto');			//selezione del db con il nome e la connessione al server

$insert_capitano=mysqli_query($con,"INSERT INTO capitano (ID,nome,cognome,username,password)
                             VALUES(NULL, '".$nome."', '".$cognome."','".$username."','".$password."')");

$ID_Capitano=mysqli_query($con,"SELECT ID FROM capitano WHERE username='".$username."' AND cognome='".$cognome."'");

$IDCapitano= mysqli_fetch_array($ID_Capitano)[0];

$insert_squadra=mysqli_query($con,"INSERT INTO squadra (ID,Nome,Logo,IDCapitano)
                             VALUES(NULL, '".$nomeSquadra."', '".$location."',".$IDCapitano.")");

$ID_Squadra=mysqli_query($con,"SELECT ID, squadra.IDTorneo FROM squadra WHERE IDCapitano=".$IDCapitano);


$infoSquadra=mysqli_fetch_assoc($ID_Squadra);

file_put_contents("private-area/debug.txt",$infoSquadra["ID"]);
//controllo risultato
header("location:manage-squad.php?msg='Sei stato registrato correttamente alla piattaforma?Torneo=".$infoSquadra["IDTorneo"]."&Squadra=".$infoSquadra["ID"]);
?>