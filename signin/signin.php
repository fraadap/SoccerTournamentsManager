<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Iscrizione Squadra</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

    

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
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
  <nav class="navbar navbar-dark bg-primary">
        <div class="row align-items-center container">
            <div class="col container">
                <a class="navbar-brand" href="../index.html">FC D'Aprile
                    <img src="../logo-site.png" height="25" class="d-inline-block align-center">
                </a>
            </div>
        </div>
    </nav>

  <div class="container">
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../logo-site.png" height="70">
        <h2>Iscrizione Squadre</h2>
        <p class="lead">Sei il capitano della tua squadra? Iscrivi subito il tuo team ad un nostro Torneo! <br> Le partite di calcetto si terranno all'interno del D'Aprile Football Club.</p>
      </div>

      <div class="row g-5">
        <div class="col-md-7 col-lg-8" style="margin:auto;">
          <form class="needs-validation" action="../insert-squad.php" method="POST" enctype="multipart/form-data" novalidate>
          
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" placeholder="es. Francesco" name="nome" required>
                <div class="invalid-feedback">
                  Nome del capitano obbligatorio.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Cognome</label>
                <input type="text" class="form-control" id="lastName" placeholder="es. Totti" name="cognome" required>
                <div class="invalid-feedback">
                Cognome del capitano obbligatorio.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                <div class="invalid-feedback">
                    Username obbligatorio.
                  </div>
                </div>
              </div>

              <div class="col-sm-6"> <!-- AGGIUNGERE I NAME-->
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback">
                Password obbligatoria.
                </div>
              </div>

            <hr class="my-4">

            <div class="col-sm-6">
                <label for="nomeSquadra" class="form-label">Nome della Squadra</label>
                <input type="text" class="form-control" id="nomeSquadra" placeholder="es. Atalanta" name="nomeSquadra" required>
                <div class="invalid-feedback">
                Nome della squadra obbligatorio.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="logoSquadra" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo" required>
                <div class="invalid-feedback">
                Logo della squadra obbligatorio.
                </div>
              </div>

              <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Iscriviti</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2021 - FC D'Aprile</p>
      <ul class="list-inline">
      </ul>
    </footer>
  </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
