<?php
$nome=$_POST["nome"];
$partecipanti=$_POST["partecipanti"];
$categoria=$_POST["categoria"];

$con = mysqli_connect('localhost','root',''); 		//stringa di connessione al db

mysqli_select_db($con, 'torneo_calcetto');			//selezione del db con il nome e la connessione al server

$ricevuta=mysqli_query($con,"INSERT INTO torneo (ID,nPartecipanti,Nome,attivo,categoria)
                            VALUES(NULL, ".$partecipanti.", '".$nome."', 0, '".$categoria."')");
//controllo risultato
header("location:new-tournament.php?msg='Il torneo è stato creato con successo'");
?>