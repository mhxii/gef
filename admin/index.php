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
// Joueur
  if (isset($_POST['deleteJ'])) {
      $id = $_POST['id'];
      $sql = "DELETE FROM joueur WHERE id = $id";
      if ($bd->query($sql) === TRUE) {
          $sucess='sucess';
          $sucess_content='Le joueur est supprimee';
      } else {
        $error='error';
        $error_content= "Erreur de suppression";
      }
  }

  // Entraineur
  if (isset($_POST['deleteE'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM entrain WHERE id = $id";
    if ($bd->query($sql) === TRUE) {
        $sucess='sucess';
        $sucess_content="L'entraineur est supprimee";
    } else {
      $error='error';
      $error_content= "Erreur de suppression";
    }
  }

  // Match
  if (isset($_POST['deleteM'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM matchs WHERE id = $id";
    if ($bd->query($sql) === TRUE) {
        $sucess='sucess';
        $sucess_content="Le match est supprimee";
    } else {
      $error='error';
      $error_content= "Erreur de suppression";
    }
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

  if(isset($_POST['addM'])){ 
    $sql = "INSERT INTO matchs (adversaire, type, jour, tournoi, journee) VALUES (?, ?, ?, ?, ?)";
    $stmt = $bd->prepare($sql);

    if ($stmt) {
        // Lier les paramètres
        $stmt->bind_param(
            "sssss",
            $_POST['adversaire'],
            $_POST['type'],
            $_POST['jour'],
            $_POST['tournoi'],
            $_POST['journee'],
        );

        // Exécuter la requête
        if ($stmt->execute()) {
            $sucess = 'sucess';
            $sucess_content = 'Le match est ajouté';
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
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input required class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
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
            <input required class="dropdown-item logout" type="submit" name="logout" value="Déconnexion">

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
                <p class="mt-2 mb-0">4</p>
                <small>Messages</small>
              </div>
              <div class="col matchs">
                <i class="fa-2x"><img src="../images/stadium.png" alt=""></i>
                <?php
                  $sql = "SELECT * FROM matchs";
                  $result = $bd->query($sql);
                  echo "<p class='mt-2 mb-0'>" . $result->num_rows . "</p>";
                ?>
                <small>Matchs</small>
              </div>
              <div class="col playerDispo">
                <i class="fas fa-user fa-2x"></i>
                <?php
                  $sql = "SELECT * FROM joueur";
                  $result = $bd->query($sql);
                  echo "<p class='mt-2 mb-0'>" . $result->num_rows . "</p>";
                ?>
                <small>Joueurs</small>
              </div>
              <div class="col entraineur">
                <i class="fas fa-dumbbell fa-2x"></i>
                <?php
                  $sql = "SELECT * FROM entrain";
                  $result = $bd->query($sql);
                  echo "<p class='mt-2 mb-0'>" . $result->num_rows . "</p>";
                ?>
                <small>Entraîneurs</small>
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
              <ul class="match-list" style="display: block;"  >
              <?php 
                  $sql1 = "SELECT * FROM matchs ORDER BY jour DESC";
                  $result1 = $bd->query($sql1);
                  if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        echo "<li class='match'>
                                <div class='avatar'><i class='fa-2x'><img src='../images/stade.png'></i></div>";
                        if($row1["type"]=='domicile'){
                        echo   "<div class='match-content'><h5>Real Madrid VS " .$row1["adversaire"] ."</h5><p>".$row1["tournoi"]."/Journee ".$row1["journee"]."</p></div>";
                        echo   "<div class='score'>" . $row1["butE"] . "-" .$row1["butA"] . "</div>";
                        }
                        else{
                        echo   "<div class='match-content'><h5>" .$row1["adversaire"] ." VS Real Madrid</h5><p>".$row1["tournoi"]."/Journee ".$row1["journee"]."</p></div>";
                        echo   "<div class='score'>" . $row1["butA"] . "-" .$row1["butE"] . "</div>";
                        }
                        echo   "<div class='time'>" . $row1["jour"] . "</div>";
                        if($row1["status"]=="a venir"){
                        echo   "<div class='status'><i class='fas fa-long-arrow-alt-right'></i></div>";
                        }else if($row1["status"]=="en cour"){
                        echo   "<div class='status'><i class='fas fa-spinner fa-spin text-danger'></i></div>";
                        }else if($row1["status"]=="termine"){
                        echo   "<div class='status'><i class='fas fa-check-circle text-success'></i></div>";
                        }
                        echo   "<form method='POST' class='d-inline'>
                                  <input required type='hidden' name='id' value='" . $row1["id"] . "'>
                                  <button type='submit' name='deleteM' class='btn btn-danger btn-sm mr-2'>Supprimer</button>
                                </form>
                                  <input required type='hidden' name='id' value='" . $row1["id"] . "'>
                                
                                  <button type='submit' name='editM' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modifierMatch" . $row1["id"] . "'>Modifier</button>
                              </li>";
                        
                  }
                  } else {
                      echo "Pas de matchs";
                  }
                ?>
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
                                <input required type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' name='deleteJ' class='btn btn-danger btn-sm mr-2'>Supprimer</button>
                              </form>
                                <input required type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' name='editJ' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modifierJoueur" . $row["id"] . "'>Modifier</button>
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
                                  <input required type='hidden' name='id' value='" . $row["id"] . "'>
                                  <button type='submit' name='deleteE' class='btn btn-danger btn-sm mr-2'>Supprimer</button>
                                </form>
                                
                                  <input required type='hidden' name='id' value='" . $row["id"] . "'>
                                  <button type='submit' name='editE' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modifierEntraineur" . $row["id"] . "'>Modifier</button>
                                
                                  </div>

                                </div>";
                      }
                    } else {
                        echo "Pas d'entraineur";
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
            <input required type="text" name="prenom" placeholder="Prenom">
            <input required type="text" name="nom" placeholder="Nom"><br>
            <input required type="date" name="ddn" placeholder="Date naissance"><br>
            <input required type="email" name="email" placeholder="Email"><br>
            <input required type="password" name="password" placeholder="Password"><br>
            <input required type="text" name="poste" placeholder="Poste">
            <input required type="number" name="numero" placeholder="Numero"><br>
            <input required type="tel" name="tel" placeholder="Telephone"><br>
            <input required type="submit" class="btn btn-primary" name="addJ" value="Ajouter">
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
            <input required type="text" name="prenom" placeholder="Prenom">
            <input required type="text" name="nom" placeholder="Nom"><br>
            <input required type="date" name="ddn" placeholder="Date naissance"><br>
            <input required type="email" name="email" placeholder="Email">
            <input required type="password" name="password" placeholder="Password"><br>
            <input required type="text" name="role" placeholder="Role">
            <input required type="tel" name="tel" placeholder="Telephone"><br>
            <input required type="submit" class="btn btn-primary" name="addE" value="Ajouter">
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
          <form action="" method="post">
            <div class="form-group">
              <input required type="text" name="adversaire" placeholder="Adversaire"><br>
              <select name="type">
                <option value="">--Sélectionnez le type--</option>
                <option value="domicile">Domicile</option>
                <option value="exterieur">Exterieur</option>
              </select><br>
              <input required type="datetime-local" name="jour" placeholder="Date et heure"><br>
              <input required type="text" name="tournoi" placeholder="Tournoi">
              <input required type="number" name="journee" placeholder="Journee">
              <input required type="submit" class="btn btn-primary" name="addM" value="Ajouter">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  $sql = "SELECT * FROM matchs";
  $result = $bd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
echo  "<div class='modal fade' id='modifierMatch" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='modifierMatch" . $row["id"] . "' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='modifierMatch'>Modifier ce match</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <form action='' method='post'>
                <div class='form-group'>
                  <input required value='" . $row["adversaire"] . "' type='text' name='adversaire' placeholder='Adversaire'><br>
                  <select name='type'>
                    <option value=''>--Sélectionnez le type--</option>
                    <option value='domicile'>Domicile</option>
                    <option value='exterieur'>Exterieur</option>
                  </select><br>
                  <input required value='" . $row["jour"] . "' type='datetime-local' name='jour' placeholder='Date et heure'><br>
                  <input required value='" . $row["tournoi"] . "' type='text' name='tournoi' placeholder='Tournoi'>
                  <input required value='" . $row["journee"] . "' type='number' name='journee' placeholder='Journee'>
                  <input required type='hidden' name='id' value='" . $row["id"] . "'>
                  <input required type='submit' class='btn btn-primary' name='updateM' value='Modifier'>
                </div>
                
              </form>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>
            </div>
          </div>
        </div>
      </div>";
    }
  }
  ?>
   <?php
  $sql = "SELECT * FROM joueur";
  $result = $bd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
echo  "<div class='modal fade' id='modifierJoueur" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='modifierJoueur" . $row["id"] . "' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='modifierJoueur'>Modifier ce joueur</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <form action='' method='post'>
                <div class='form-group'>
                  <input value='" . $row["prenom"] . "' required type='text' name='prenom' placeholder='Prenom'>
                  <input value='" . $row["nom"] . "' required type='text' name='nom' placeholder='Nom'><br>
                  <input value='" . $row["ddn"] . "' required type='date' name='ddn' placeholder='Date naissance'><br>
                  <input value='" . $row["email"] . "' required type='email' name='email' placeholder='Email'>
                  <input value='" . $row["password"] . "' required readonly type='password' name='password' placeholder='Password'><br>
                  <input value='" . $row["poste"] . "' required type='text' name='poste' placeholder='Poste'>
                  <input value='" . $row["numero"] . "' required type='number' name='numero' placeholder='Numero'><br>
                  <input value='" . $row["tel"] . "' required type='tel' name='tel' placeholder='Telephone'><br>
                  <input required type='hidden' name='id' value='" . $row["id"] . "'>
                  <input required type='submit' class='btn btn-primary' name='updateJ' value='Modifier'>
                </div>
              </form>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>
            </div>
          </div>
        </div>
      </div>";
    }
  }
  ?>
     <?php
  $sql = "SELECT * FROM entrain";
  $result = $bd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
echo  "<div class='modal fade' id='modifierEntraineur" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='modifierEntraineur" . $row["id"] . "' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='modifierEntraineur'>Modifier cette entraineur</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <form action='' method='post'>
                <div class='form-group'>
                  <input value='" . $row["prenom"] . "' required type='text' name='prenom' placeholder='Prenom'>
                  <input value='" . $row["nom"] . "' required type='text' name='nom' placeholder='Nom'><br>
                  <input value='" . $row["ddn"] . "' required type='date' name='ddn' placeholder='Date naissance'><br>
                  <input value='" . $row["email"] . "' required type='email' name='email' placeholder='Email'>
                  <input value='" . $row["password"] . "' required readonly type='password' name='password' placeholder='Password'><br>
                  <input value='" . $row["role"] . "' required type='text' name='role' placeholder='Role'>
                  <input value='" . $row["tel"] . "' required type='tel' name='tel' placeholder='Telephone'><br>
                  <input required type='hidden' name='id' value='" . $row["id"] . "'>
                  <input required type='submit' class='btn btn-primary' name='updateE' value='Modifier'>
                </div>
              </form>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>
            </div>
          </div>
        </div>
      </div>";
    }
  }
  ?>
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
  <script>
      var sucess=document.querySelector(".sucess");
    sucess.style.display="block";
    setTimeout(function() {
        sucess.style.display = 'none';
    }, 3000);
  </script>
</body>
</html>

<?php
              if(isset($_POST['updateM'])){ 
                $sql = "UPDATE matchs 
                  SET adversaire = ?, type = ?, jour = ?, tournoi = ?, journee = ? 
                  WHERE id = ?";
                $stmt = $bd->prepare($sql);
            
                if ($stmt) {
                    // Lier les paramètres
                    $stmt->bind_param(
                        "ssssss",
                        $_POST['adversaire'],
                        $_POST['type'],
                        $_POST['jour'],
                        $_POST['tournoi'],
                        $_POST['journee'],
                        $_POST['id'],
                    );
            
                    // Exécuter la requête
                    if ($stmt->execute()) {
                        $sucess = 'sucess';
                        $sucess_content = 'Le match a ete modifier';
                    } else {
                        $error = 'error';
                        $error_content = "Erreur de modification: " . $stmt->error;
                    }
                } else {
                    $error = 'error';
                    $error_content = "Erreur de préparation de la requête: " . $bd->error;
                }
              }
              if(isset($_POST['updateJ'])){ 
                $sql = "UPDATE joueur 
                  SET email = ?, prenom = ?, nom = ?, tel = ?, poste = ?, numero = ?, ddn = ?
                  WHERE id = ?";
                $stmt = $bd->prepare($sql);
            
                if ($stmt) {
                    // Lier les paramètres
                    $stmt->bind_param(
                        "ssssssss",
                        $_POST['email'],
                        $_POST['prenom'],
                        $_POST['nom'],
                        $_POST['tel'],
                        $_POST['poste'],
                        $_POST['numero'],
                        $_POST['ddn'],
                        $_POST['id'],
                    );
            
                    // Exécuter la requête
                    if ($stmt->execute()) {
                        $sucess = 'sucess';
                        $sucess_content = 'Le joueur a ete modifier';
                    } else {
                        $error = 'error';
                        $error_content = "Erreur de modification: " . $stmt->error;
                    }
                } else {
                    $error = 'error';
                    $error_content = "Erreur de préparation de la requête: " . $bd->error;
                }
              }
              if(isset($_POST['updateE'])){ 
                $sql = "UPDATE entrain 
                  SET email = ?, prenom = ?, nom = ?, tel = ?, role = ?, ddn = ?
                  WHERE id = ?";
                $stmt = $bd->prepare($sql);
            
                if ($stmt) {
                    // Lier les paramètres
                    $stmt->bind_param(
                        "sssssss",
                        $_POST['email'],
                        $_POST['prenom'],
                        $_POST['nom'],
                        $_POST['tel'],
                        $_POST['role'],
                        $_POST['ddn'],
                        $_POST['id'],
                    );
            
                    // Exécuter la requête
                    if ($stmt->execute()) {
                        $sucess = 'sucess';
                        $sucess_content = 'L entraineur a ete modifier';
                    } else {
                        $error = 'error';
                        $error_content = "Erreur de modification: " . $stmt->error;
                    }
                } else {
                    $error = 'error';
                    $error_content = "Erreur de préparation de la requête: " . $bd->error;
                }
              }
?>