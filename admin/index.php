<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion d'équipe de football</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="Logo de l'équipe" height="30">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Effectif</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Calendrier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">News</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
      </form>
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Profil</a>
          <a class="dropdown-item" href="#">Paramètres</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Déconnexion</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Tableau de Bord</h5>
          </div>
          <div class="card-body">
            <div class="row status-row">
              <div class="col message">
                <i class="fas fa-envelope fa-2x"></i>
                <p class="mt-2 mb-0">8</p>
                <small>Messages</small>
              </div>
              <div class="col player-list-trigger">
                <i class="fas fa-user fa-2x"></i>
                <p class="mt-2 mb-0">29</p>
                <small>Joueurs disponibles</small>
              </div>
              <div class="col entraineur">
                <i class="fas fa-dumbbell fa-2x"></i>
                <p class="mt-2 mb-0">3</p>
                <small>Entraîneurs</small>
              </div>
              <div class="col player-list-injured">
                <i class="fas fa-user-injured fa-2x" data-toggle="modal" data-target="#playerInjuredModal"></i>
                <p class="mt-2 mb-0">4</p>
                <small>Joueurs blessés</small>
              </div>
              <div class="col">
                <i class="fas fa-sun fa-2x"></i>
                <p class="mt-2 mb-0">20 km/h <i class="fas fa-wind"></i></p>
                <small>Climat</small>
              </div>
              <div class="col">
                <i class="fas fa-trophy fa-2x" data-toggle="modal" data-target="#trophiesModal"></i>
                <p class="mt-2 mb-0">29</p>
                <small>Trophées</small>
              </div>
            </div>
            <!-- <div class="row status-row message">
              
              <div class="col-sm-3">
                <i class="fas fa-user-circle fa-2x text-danger"></i>
                <p class="mt-2 mb-0">Je ne peux pas me connecter</p>
                <small>JOUEURS 1</small>
              </div>
              <div class="col-sm-3">
                <i class="fas fa-user-circle fa-2x text-success"></i>
                <p class="mt-2 mb-0">Je ne peux pas me connecter</p>
                <small>JOUEURS 1</small>
              </div>
              <div class="col-sm-3">
                <i class="fas fa-user-circle fa-2x text-success"></i>
                <p class="mt-2 mb-0">ENTRAINEUR</p>
              </div>
              <div class="col-sm-3">
                <i class="fas fa-user-circle fa-2x text-success"></i>
                <p class="mt-2 mb-0">Je ne peux pas me connecter</p>
                <small>JOUEURS 1</small>
              </div>
            </div> -->
            <div class="row status-row content">

            </div>
            <div class="text-right">
              <button class="btn btn-primary">Suivant <i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- Autres colonnes -->
    </div>
  </div>

  <!-- Modal des joueurs blessés -->
  <div class="modal fade" id="playerInjuredModal" tabindex="-1" role="dialog" aria-labelledby="playerInjuredModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="playerInjuredModalLabel">Joueurs blessés</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Contenu de la modale des joueurs blessés -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal des trophées -->
  <div class="modal fade" id="trophiesModal" tabindex="-1" role="dialog" aria-labelledby="trophiesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="trophiesModalLabel">Trophées</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Contenu de la modale des trophées -->
          <div class="row">
            <div class="col-md-4">
              <div class="trophy-item">
                <img src="trophy1.jpg" alt="Trophée 1" class="img-fluid">
                <h6>Championnat National 2022</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="trophy-item">
                <img src="trophy2.jpg" alt="Trophée 2" class="img-fluid">
                <h6>Coupe de la Ligue 2021</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="trophy-item">
                <img src="trophy3.jpg" alt="Trophée 3" class="img-fluid">
                <h6>Supercoupe 2020</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
  <script src="players.js"></script>
  <script src="messages.js"></script>
</body>
</html>