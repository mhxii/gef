<?php 
session_start();
if(empty($_SESSION['email'])){
  header("Location: http://localhost/gef/");
}

@$logout=$_POST["logout"];
    if(isset($logout)){
        session_destroy();
        header("Location: http://localhost/gef/");
    
    }
include_once('../config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['delete'])) {
      $id = $_POST['id'];
      $sql = "DELETE FROM joueur WHERE id = $id";
      if ($bd->query($sql) === TRUE) {
          $sucess='sucess';
          $sucess_content='Le joueur est supprimee';
      } else {
        $error='error';
        $error_content= "Erreur de suppression";
      }
  } elseif (isset($_POST['edit'])) {
      // Traiter la modification ici (afficher le formulaire de modification, etc.)
      $id = $_POST['id'];
      // Exemple simple pour démonstration :
      echo "Modifier le joueur avec ID: $id";
  }

  if(isset($_POST['addJ'])){ 
    $sql = "INSERT INTO joueur (email, password, prenom, nom, tel, role, poste, numero, ddn) VALUES (?, ?, ?, ?, ?, 'Joueur', ?, ?, ?)";
    $stmt = $bd->prepare($sql);

    if ($stmt) {
        // Lier les paramètres
        $stmt->bind_param(
            "ssssssss",
            $_POST['email'],
            $_POST['password'],
            $_POST['prenom'],
            $_POST['nom'],
            $_POST['tel'],
            $_POST['poste'],
            $_POST['numero'],
            $_POST['ddn']
        );

        // Exécuter la requête
        if ($stmt->execute()) {
            $sucess = 'sucess';
            $sucess_content = 'Le joueur est ajouté';
        } else {
            $error = 'error';
            $error_content = "Erreur d'ajout: " . $stmt->error;
        }
    } else {
        $error = 'error';
        $error_content = "Erreur de préparation de la requête: " . $bd->error;
    }
  }

  if(isset($_POST['addE'])){ 
    $sql = "INSERT INTO entrain (email, password, prenom, nom, tel, role,  ddn) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $bd->prepare($sql);

    if ($stmt) {
        // Lier les paramètres
        $stmt->bind_param(
            "sssssss",
            $_POST['email'],
            $_POST['password'],
            $_POST['prenom'],
            $_POST['nom'],
            $_POST['tel'],
            $_POST['role'],
            $_POST['ddn']
        );

        // Exécuter la requête
        if ($stmt->execute()) {
            $sucess = 'sucess';
            $sucess_content = 'Le entraineur est ajouté';
        } else {
            $error = 'error';
            $error_content = "Erreur d'ajout: " . $stmt->error;
        }
    } else {
        $error = 'error';
        $error_content = "Erreur de préparation de la requête: " . $bd->error;
    }
  }
}
?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion d'équipe de football</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
          <p><?=$_SESSION['prenom'].' '.$_SESSION['nom']?></p>
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="#"><?=$_SESSION['role']?></a>
          <a class="dropdown-item" href="#">Profil</a>
          <div class="dropdown-divider"></div>
          <form action="" method="post">
            <input class="dropdown-item logout" type="submit" name="logout" value="Déconnexion">

          </form>
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
              <div class="col playerDispo">
                <i class="fas fa-user fa-2x"></i>
                <p class="mt-2 mb-0">29</p>
                <small>Joueurs</small>
              </div>
              <div class="col entraineur">
                <i class="fas fa-dumbbell fa-2x"></i>
                <p class="mt-2 mb-0">3</p>
                <small>Entraîneurs</small>
              </div>
              <div class="col planning">
                <i class="fas fa-calendar fa-2x" data-toggle="modal" data-target="#trophiesModal"></i>
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
                  <div class="match-content"><h5>Equipe VS Adversaire</h5><p>Coupe / 1/8 Final</p></div>
                  <div class="score">0-0</div>
                  <div class="time">02/06/2024 12:30</div>
                  <div class="status"><i class="fas fa-check-circle text-success"></i></div>
                  <button class="btn btn-primary btn-sm">Modifier</button>
                </li>
              </ul>
              <div class="text-left">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterMatch">Ajouter un match</button>
              </div>
            </div>
            <div class="row status-row playerList">
              <div class="col-12" id="playerList">
                <div class="row mb-3 p-3 mb-2 bg-secondary text-white">
                  <div class="col-2">Prenom</div>
                  <div class="col-2">Nom</div>
                  <div class="col-2">Numero</div>
                  <div class="col-2">Poste</div>
                  <div class="col-3">
                    EDITER
                  </div>
                </div>
                <?php 
                  $sql = "SELECT * FROM joueur";
                  $result = $bd->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='row mb-3'>
                                <div class='col-2'>" . $row["prenom"] ."</div>
                                <div class='col-2'>" . $row["nom"] . "</div>
                                <div class='col-2'>" . $row["numero"] . "</div>
                                <div class='col-2'>" . $row["poste"] . "</div>
                                <div class='col-3'>
                                  <form method='POST' class='d-inline'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' name='delete' class='btn btn-danger btn-sm mr-2'>Supprimer</button>
                              </form>
                              <form method='POST' class='d-inline'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' name='edit' class='btn btn-primary btn-sm'>Modifier</button>
                              </form>
                                </div>

                              </div>";
                    }
                  } else {
                      echo "Pas de joueurs";
                  }
                ?>
              </div>
              <div class="text-left">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterJoueur">Ajouter un joueur</button>
              </div>
            </div>
            <div class="row status-row entraineur">
              <div class="col-12 " id="trainerList">
                <div class="row mb-3 p-3 mb-2 bg-secondary text-white">
                  <div class="col-3">Prenom</div>
                  <div class="col-2">Nom</div>
                  <div class="col-4">Role</div>
                  <div class="col-3">
                    EDITER
                  </div>
                </div>
                <div class="col-12" id="playerList">
                  <?php 
                    $sql = "SELECT * FROM entrain";
                    $result = $bd->query($sql);
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<div class='row mb-3'>
                                  <div class='col-3'>" . $row["prenom"] ."</div>
                                  <div class='col-2'>" . $row["nom"] . "</div>
                                  <div class='col-4'>" . $row["role"] . "</div>
                                  <div class='col-3'>
                                    <form method='POST' class='d-inline'>
                                  <input type='hidden' name='id' value='" . $row["id"] . "'>
                                  <button type='submit' name='delete' class='btn btn-danger btn-sm mr-2'>Supprimer</button>
                                </form>
                                <form method='POST' class='d-inline'>
                                  <input type='hidden' name='id' value='" . $row["id"] . "'>
                                  <button type='submit' name='edit' class='btn btn-primary btn-sm'>Modifier</button>
                                </form>
                                  </div>

                                </div>";
                      }
                    } else {
                        echo "Pas de joueurs";
                    }
                  ?>
                </div>
              </div>
              <div class="text-left">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterEntraineur">Ajouter un entraineur</button>
              </div>
            </div>
            </div>
            <div class="text-right">
              <button class="btn btn-primary">Suivant <i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ajouterJoueur" tabindex="-1" role="dialog" aria-labelledby="ajouterJoueurLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ajouterJoueurLabel">Ajouter un joueur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
          <div class="form-group">
            <input type="text" name="prenom" placeholder="Prenom">
            <input type="text" name="nom" placeholder="Nom"><br>
            <input type="date" name="ddn" placeholder="Date naissance"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="text" name="poste" placeholder="Poste">
            <input type="number" name="numero" placeholder="Numero"><br>
            <input type="tel" name="tel" placeholder="Telephone"><br>
            <input type="submit" class="btn btn-primary" name="addJ" value="Ajouter">
          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ajouterEntraineur" tabindex="-1" role="dialog" aria-labelledby="ajouterEntraineurLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ajouterEntraineurLabel">Ajouter un joueur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
          <div class="form-group">
            <input type="text" name="prenom" placeholder="Prenom">
            <input type="text" name="nom" placeholder="Nom"><br>
            <input type="date" name="ddn" placeholder="Date naissance"><br>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password"><br>
            <input type="text" name="role" placeholder="Role">
            <input type="tel" name="tel" placeholder="Telephone"><br>
            <input type="submit" class="btn btn-primary" name="addE" value="Ajouter">
          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ajouterMatch" tabindex="-1" role="dialog" aria-labelledby="ajouterMatch" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ajouterMatch">Ajouter un match</h5>
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
  <div class="<?=@$error;?>">
    <?=@$error_content;?>
  </div>
  <div class="<?=@$sucess;?>">
    <?=@$sucess_content;?>
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