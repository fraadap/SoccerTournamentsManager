
<?php
session_start();
if(isset($_SESSION['sicurezza'])){
  if($_SESSION['sicurezza'] !== 0){
    header("location:../login.php?msg='Hai provato ad accedere ad un\'area riservata, ti sei perso?'");
  }
}
else header("location:../login.php?msg='Hai provato ad accedere ad un\'area riservata, ti sei perso?'");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.83.1">
  <title>Area riservata</title>
  
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/features/">
  
  
  
  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }
    
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  
  
  <!-- Custom styles for this template -->
  <link href="features.css" rel="stylesheet">
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
  
  <main>
    <h1 class="visually-hidden">Features examples</h1>
    
    
    <h2 class="pb-2 border-bottom">Gestione Tornei</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      
      <?php
      $con = mysqli_connect('localhost','root',''); 		//stringa di connessione al db
      
      mysqli_select_db($con, 'torneo_calcetto');
      
      $ricevuta= mysqli_query($con,"SELECT * from torneo");
      
     
      if(mysqli_num_rows($ricevuta)==0){
        header("location:/new-tournament.php?msg=Non sono presenti tornei nel sistema, creane uno");
      } 
      while($row = mysqli_fetch_assoc($ricevuta)){
        $nIscritti=mysqli_query($con,"SELECT COUNT(squadra.ID) as nIscritti FROM torneo JOIN squadra ON torneo.ID=squadra.IDTorneo WHERE torneo.ID =".$row["ID"]);
        $n=mysqli_fetch_row($nIscritti);
        echo("<div class='col d-flex align-items-start'>");
        echo("<div class='container'>");
        echo("<h2>".$row["Nome"]);

        if($row["attivo"]==0){
          echo("<a class='btn btn-primary btn-sm' style='margin-left:25px;' href='changeStatusTournament.php?IDTorneo=".$row["ID"]."&status=".$row["attivo"]."'>Attiva</a>");
        }
        else{
          echo("<a class='btn btn-danger btn-sm' style='margin-left:25px;' href='changeStatusTournament.php?IDTorneo=".$row["ID"]."&status=".$row["attivo"]."'>Disattiva</a>");
        }
        echo("</h2>");
        echo("<h4>".$row["categoria"]."</h3>");
        echo("<h5>".$n[0]."/".$row['nPartecipanti']."</h5>");
        if($row["attivo"]==0){
          echo("<h5 style='color:red'>Non Attivo</h5>");
        }
        else{
            echo("<h5 style='color:green'>Attivo</h5>");
        }
        echo("<a href='manage-tournament.php?Torneo=".$row['ID']."' class='btn btn-primary'>Seleziona Torneo</a>");
        echo("</div></div>");
      }
              
      ?>
              
              <!--          
                <p>Questa istruzione permtte di creare un nuovo torneo e rendendolo subito pubblico alle iscrizioni</p>
                <a href="new-tournament.php" class="btn btn-primary">
                  Crea nuovo torneo
                </a>
              </div>
            </div>
          -->
          
    </main>   
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2021 - FC D'Aprile</p>
        <ul class="list-inline">
        </ul>
      </footer>
    </div>
    
    
    
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    
    
  </body>
  </html>