<?php
session_start();
if(isset($_POST["username-amministrator"])&& isset($_POST["password-amministrator"])){
    $user=$_POST["username-amministrator"];
    $pass=$_POST["password-amministrator"];
    
    $con = mysqli_connect('localhost','root',''); 		//stringa di connessione al db
    
    mysqli_select_db($con, 'torneo_calcetto');						//selezione del db con il nome e la connessione al server
    
    $ricevuta=mysqli_query($con,"SELECT * FROM amministratore WHERE username='" . $user . "' AND password='" . $pass . "'");
    var_dump($ricevuta);
    
    $row=mysqli_fetch_array($ricevuta);					//il risultato ottenuto si trasforma in un array
    
    //hash("sha256",$pass)
    
    if($row['username']==$user && $row['username']!= NULL){		
        $_SESSION["sicurezza"]=0;
        header("location:private-area/private-area.php");
    }else{
        header("location:amministration.php?msg='Username o password errati'");
    }  
    
    mysqli_close($con);
    
}elseif(isset($_POST["username-user"])&& isset($_POST["password-user"])){
    $user=$_POST["username-user"];
    $pass=$_POST["password-user"];
    
    $con = mysqli_connect('localhost','root',''); 		//stringa di connessione al db
    
    mysqli_select_db($con, 'torneo_calcetto');			//selezione del db con il nome e la connessione al server
    
    $ricevuta=mysqli_query($con,"select * from capitano where username='" . $user . "' and password='" . $pass . "'");
    
    $row=mysqli_fetch_array($ricevuta);					//il risultato ottenuto si trasforma in un array
    
    $ricevuta2=mysqli_query($con, "SELECT ID,squadra.IDTorneo FROM squadra WHERE squadra.IDCapitano=".$row[0]);
    
    $infoSquadra = mysqli_fetch_assoc($ricevuta2);
    
    
    if($row['username']==$user && $row['username']!= NULL){		
        $_SESSION['sicurezza']=1;
        header("location:manage-squad.php?Torneo=".$infoSquadra["IDTorneo"]."&Squadra=".$infoSquadra["ID"]);
    }
    else{
        header("location:login.php?msg='Username o password errati'");
    }
    
    
    mysqli_close($con);
    
}
?>