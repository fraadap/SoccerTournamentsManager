<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
<div class="row align-items-center container">
<div class="col container">
<a class="navbar-brand" href="../index.html">FC D'Aprile
<img src="../logo-site.png" style="height:25px;">
</a>
</div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-sm" style="width:50%;">
<h1>Calendario</h1>
<?php
$ID_Torneo=$_GET["Torneo"];
$con = mysqli_connect('localhost','root',''); 		//stringa di connessione al db

mysqli_select_db($con, 'torneo_calcetto');

if(isset($_POST["ID"])){
  $query="UPDATE partita SET partita.data='".$_POST['data']."', partita.golCasa=".$_POST['golCasa'].", partita.golCasa=".$_POST['golCasa']." WHERE ID=".$_POST['ID'];
  $update=mysqli_query($con,$query);
  
}

$ricevuta= mysqli_query($con,"SELECT * from partita WHERE IDTorneo=".$ID_Torneo." ORDER BY partita.data");
if(mysqli_num_rows($ricevuta)==0){
  echo("<a href='generate-matches.php?Torneo=".$ID_Torneo."' class='btn btn-primary' style='margin-top:20px;'>Genera Partite</a>");
}else{
  echo("<table class='table'>");
  echo("<tr><th >Squadra Casa</th> <th >Squadra Trasferta</th> <th >Data</th> <th >Gol Casa</th> <th >Gol Trasferta</th> </tr>");
  
  while($row_partita=mysqli_fetch_assoc($ricevuta)){
    $ricevutaCasa = mysqli_query($con,"SELECT nome FROM squadra WHERE ID=".$row_partita['IDSquadraCasa']);
    $ricevutaTrasferta = mysqli_query($con,"SELECT nome FROM squadra WHERE ID=".$row_partita['IDSquadraTrasferta']);
    $nomeCasa = mysqli_fetch_array($ricevutaCasa)[0];
    $nomeTrasferta = mysqli_fetch_array($ricevutaTrasferta)[0];
    echo("<tr>");
    echo("<form action='' method='POST'>");
    echo("<td>".$nomeCasa."</td>
    <td>".$nomeTrasferta."</td>
    <input type='hidden' name='ID' value='".$row_partita["ID"]."'>
    <td><input type='text' size='8' name='data' value=".$row_partita['data']."></td>
    <td><input type='text' size='1' name='golCasa' value=".$row_partita['golCasa']."></td>
    <td><input type='text' size='1' name='golTrasferta' value=".$row_partita['golTrasferta']."><input style='margin-left:2px;' class='btn btn-primary btn-sm' type='submit' value='modifica'></td>
    </form>
    </tr>");
  }
  echo("</table>");
}
?>
</div>

<div class="col-sm" style="width:50%;">
<h1>Classifica</h1>
<?php
$ricevuta = mysqli_query($con,"SELECT posizione, squadra.Nome, vittorie, sconfitte, pareggi, punteggio  FROM classifica JOIN squadra ON classifica.IDsquadra=squadra.ID WHERE classifica.IDTorneo=".$ID_Torneo." ORDER BY classifica.posizione");

if(mysqli_num_rows($ricevuta)==0){
  echo("<h3 style='margin-top:20px;'>Generare il calendario per inziare a disputare le partite</h3>");
}else{
  echo("<table class='table'");
  echo("<tr><th>#</th><th>Squadra</th> <th style='color:green;'>V</th> <th style='color:red;'>S</th> <th style='color:orange;'>P</th> <th>Punteggio</th> </tr>");
    while($row=mysqli_fetch_row($ricevuta)){
      echo("<tr>");
      $cont=0;
      while($cont<count($row)){
        echo("<td>".$row[$cont]."</td>");
        $cont+=1;
      }
      echo("</tr>");
    }
    echo("</table>"); 
  }
  ?>
  </div>
  </div>
  </div>
  </body>
  </html>