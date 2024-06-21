<!DOCTYPE html>
<html lang="fr">
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
              <div class="col matchs">
                <i class="fa-2x"><img src="../images/stadium.png" alt=""></i>
                <p class="mt-2 mb-0">29</p>
                <small>Matchs</small>
              </div>
              <div class="col entrainement">
                <i class="fas fa-dumbbell fa-2x"></i>
                <p class="mt-2 mb-0">3</p>
                <small>Entraînement</small>
              </div>
              <div class="col playerDispo">
                <i class="fas fa-user-alt fa-2x"></i>
                <p class="mt-2 mb-0">4</p>
                <small>Joueurs Disponible</small>
              </div>
              <div class="col playerBlesse">
                <i class="fas fa-user-injured fa-2x"></i>
                <p class="mt-2 mb-0"></p>
                <small>Joueurs Blesse</small>
              </div>
              <div class="col planning">
                <i class="fas fa-calendar fa-2x"></i>
                <p class="mt-2 mb-0">29</p>
                <small>Planning</small>
              </div>
            </div>
            <div class="row status-row message">
              <ul class="message-list" style="display: block;">
                <li class="message">
                  <div class="avatar"><i class="fas fa-user"></i></div>
                  <div class="message-content"><h5>John Doe</h5><p>Message terminé</p></div>
                  <div class="status"><i class="fas fa-check-circle text-success"></i></div>
                  <button class="btn btn-primary btn-sm reply-btn">Répondre</button>
                </li>
                <li class="message">
                  <div class="avatar"><i class="fas fa-user"></i></div>
                  <div class="message-content"><h5>Jane Smith</h5><p>Message en cours</p></div>
                  <div class="status"><i class="fas fa-spinner fa-spin text-danger"></i></div>
                  <button class="btn btn-primary btn-sm reply-btn">Répondre</button>
                </li>
                <li class="message">
                  <div class="avatar"><i class="fas fa-user"></i></div>
                  <div class="message-content"><h5>Bob Johnson</h5><p>Message terminé</p></div>
                  <div class="status"><i class="fas fa-check-circle text-success"></i></div>
                  <button class="btn btn-primary btn-sm reply-btn">Répondre</button>
                </li>
                <li class="message">
                  <div class="avatar"><i class="fas fa-user"></i></div>
                  <div class="message-content"><h5>Samantha Lee</h5><p>Message en cours</p></div>
                  <div class="status"><i class="fas fa-spinner fa-spin text-danger"></i></div>
                  <button class="btn btn-primary btn-sm reply-btn">Répondre</button>
                </li>
              </ul>
            </div>
            <div class="row status-row matchList">
              <ul class="match-list" style="display: block;">
                <li class="match">
                  <div class="avatar"><i class="fa-2x"><img src="../images/stade.png" alt="" sizes="" srcset=""></i></div>
                  <div class="match-content"><h5>Equipe VS Adversaire</h5><p>Ligue / Journee 12</p></div>
                  <div class="score">0-0</div>
                  <div class="time">27/06/2024 15:30</div>
                  <div class="status"><i class="fas fa-long-arrow-alt-right"></i></div>
                  <button class="btn btn-primary btn-sm">Modifier</button>
                </li>
                <li class="match">
                  <div class="avatar"><i class="fa-2x"><img src="../images/stade.png" alt="" srcset=""></i></div>
                  <div class="match-content"><h5>Adversaire VS Equipe</h5><p>LDC / Journee 1</p></div>
                  <div class="score">2-0</div>
                  <div class="time">17/06/2024 15:30</div>
                  <div class="status"><i class="fas fa-spinner fa-spin text-danger"></i></div>
                  <button class="btn btn-primary btn-sm">Modifier</button>
                </li>
                <li class="match">
                  <div class="avatar"><i class="fa-2x"><img src="../images/stade.png" alt="" srcset=""></i></div>
                  <div class="match-content"><h5>Adversaire VS Equipe</h5><p>Ligue / Journee 11</p></div>
                  <div class="score">4-0</div>
                  <div class="time">11/06/2024 19:30</div>
                  <div class="status"><i class="fas fa-check-circle text-success"></i></div>
                  <button class="btn btn-primary btn-sm">Modifier</button>
                </li>
                <li class="match">
                  <div class="avatar"><i class="fa-2x"><img src="../images/stade.png" alt="" srcset=""></i></div>
                  <div class="match-content"><h5>Equipe VS Adversaire</h5><p>Coupe / 1/8 Final</p></div>                  <div class="score">0-0</div>
                  <div class="time">02/06/2024 12:30</div>
                  <div class="status"><i class="fas fa-check-circle text-success"></i></div>
                  <button class="btn btn-primary btn-sm">Modifier</button>
                </li>
              </ul>
            </div>
            <div class="row status-row entrainementList">
              <ul class="trainer-list" style="display: block;">
                <li class="trainer">
                  <div class="avatar text-light"><i class="fa-2x"><img src="../images/trainer.png" alt="" sizes="" srcset=""></i></div>
                  <div class="trainer-content"><h5>Entraînement</h5><p>Passe</p></div>
                  <div class="time">27/06/2024 15:30</div>
                  <div class="status"><i class="fas fa-long-arrow-alt-right"></i></div>
                  <button class="btn btn-primary btn-sm">Modifier</button>
                  <button class="btn btn-danger btn-sm mr-2">Supprimer</button>
                </li>
                <li class="trainer">
                  <div class="avatar text-light"><i class="fa-2x"><img src="../images/trainer.png" alt="" srcset=""></i></div>
                  <div class="trainer-content"><h5>Entraînement</h5><p>Physique</p></div>
                  <div class="time">17/06/2024 15:30</div>
                  <div class="status"><i class="fas fa-spinner fa-spin text-danger"></i></div>
                  <button class="btn btn-primary btn-sm">Modifier</button>
                  <button class="btn btn-danger btn-sm mr-2">Supprimer</button>
                </li>
                <li class="trainer">
                  <div class="avatar text-light"><i class="fa-2x"><img src="../images/trainer.png" alt="" srcset=""></i></div>
                  <div class="trainer-content"><h5>Entraînement</h5><p>Tir</p></div>
                  <div class="time">11/06/2024 19:30</div>
                  <div class="status"><i class="fas fa-check-circle text-success"></i></div>
                  <button class="btn btn-primary btn-sm">Modifier</button>
                  <button class="btn btn-danger btn-sm mr-2">Supprimer</button>
                </li>
              </ul>
              <div class="text-left">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterEntrainement">Ajouter un entrainement</button>
              </div>
            </div>
            <div class="row status-row playerList">
              <div class="col-12" id="playerList">
                <div class="row mb-3">
                  <div class="col-3">Lionel Messi</div>
                  <div class="col-2">10</div>
                  <div class="col-4">AID</div>
                  <div class="col-3">
                    <button class="btn btn-primary btn-sm">Modifier</button>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3">Cristiano Ronaldo</div>
                  <div class="col-2">7</div>
                  <div class="col-4">AC</div>
                  <div class="col-3">
                    <button class="btn btn-primary btn-sm">Modifier</button>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3">Nicolas Pepe</div>
                  <div class="col-2">3</div>
                  <div class="col-4">DC</div>
                  <div class="col-3">
                    <button class="btn btn-primary btn-sm">Modifier</button>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3">Edouard Mendy</div>
                  <div class="col-2">22</div>
                  <div class="col-4">Gardien</div>
                  <div class="col-3">
                    <button class="btn btn-primary btn-sm">Modifier</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row status-row playerBlesse">
              <div class="col-12">
                <div class="row mb-3">
                  <div class="col-3">ISCO ALARCON</div>
                  <div class="col-2">22</div>
                  <div class="col-4">AIG</div>
                  <div class="col-3">
                    <button class="btn btn-primary btn-sm">Modifier</button>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3">James Madisson</div>
                  <div class="col-2">10</div>
                  <div class="col-4">MO</div>
                  <div class="col-3">
                    <button class="btn btn-primary btn-sm">Modifier</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row status-row"></div>
            <div class="row status-row"></div>
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
  <div class="modal fade" id="ajouterEntrainement" tabindex="-1" role="dialog" aria-labelledby="ajouterEntrainement" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ajouterEntrainement">Ajouter un entrainement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post"></form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modifierEntraiment" tabindex="-1" role="dialog" aria-labelledby="modifierEntraiment" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modifierEntraiment">Trophées</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
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
  <script src="trainers.js"></script>
</body>
</html>