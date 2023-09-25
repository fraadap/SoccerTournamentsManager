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
<html lang="it">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <title>Creazione Torneo</title>
    <style>
        #container-form{
            width: 30%;
        }
    </style>
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
    
    <div class="container" id="container-form">
        <h2>Creazione Torneo</h2>
        <form action="insert-tournament.php" method="POST">
            <div class="mb-3">
                <label for="NomeTorneo" class="form-label">Nome Torneo</label>
                <input type="text" class="form-control" id="nomeTorneo"  name="nome">
            </div>
            <div class="mb-3">
                <label for="partecipanti" class="form-label">Numero partecipanti</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="partecipanti">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="categoria">
            </div>
            <button type="submit" class="btn btn-primary">Conferma</button>
        </form>
    </div>
    
 
    <?php
        if (isset($_GET['msg'])){
            echo ("<script language='javascript'>alert (".$_GET['msg'].");</script>"); 
        }
    ?>
</body>
</html>