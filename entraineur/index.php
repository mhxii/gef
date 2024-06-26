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
    $sql = "DELETE FROM entrainement WHERE id = $id";
    if ($bd->query($sql) === TRUE) {
        $sucess='sucess';
        $sucess_content="L'entrainement est supprimee";
    } else {
      $error='error';
      $error_content= "Erreur de suppression";
    }
  }

  // Match
  if (isset($_POST['demarreM'])) {
    $id = $_POST['id'];
    $sql = "UPDATE matchs set status ='en cour'  WHERE id = $id";
    if ($bd->query($sql) === TRUE) {
        $sucess='sucess';
        $sucess_content="Le match a demarre";
    } else {
      $error='error';
      $error_content= "Erreur de MAJ";
    }
  }

    // Entrainement
    if (isset($_POST['demarreE'])) {
      $id = $_POST['id'];
      $sql = "UPDATE entrainement set status ='en cour'  WHERE id = $id";
      if ($bd->query($sql) === TRUE) {
          $sucess='sucess';
          $sucess_content="Le match a demarre";
      } else {
        $error='error';
        $error_content= "Erreur de MAJ";
      }
    }
    if (isset($_POST['majE'])) {
      $id = $_POST['id'];
      $sql = "UPDATE entrainement set status ='termine'  WHERE id = $id";
      if ($bd->query($sql) === TRUE) {
          $sucess='sucess';
          $sucess_content="L entrainement est termine";
      } else {
        $error='error';
        $error_content= "Erreur de MAJ";
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
    $sql = "INSERT INTO entrainement (type, date) VALUES (?, ?)";
    $stmt = $bd->prepare($sql);

    if ($stmt) {
        // Lier les paramètres
        $stmt->bind_param(
            "ss",
            $_POST['type'],
            $_POST['date'],

        );

        // Exécuter la requête
        if ($stmt->execute()) {
            $sucess = 'sucess';
            $sucess_content = 'L entrainement est ajouté';
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
              <div class="col entrainement">
                <i class="fas fa-dumbbell fa-2x"></i>
                <?php
                  $sql = "SELECT * FROM entrainement";
                  $result = $bd->query($sql);
                  echo "<p class='mt-2 mb-0'>" . $result->num_rows . "</p>";
                ?>
                <small>Entraînement</small>
              </div>
              <div class="col playerDispo">
                <i class="fas fa-user fa-2x"></i>
                <?php
                  $sql = "SELECT * FROM joueur where sante='forme'";
                  $result = $bd->query($sql);
                  echo "<p class='mt-2 mb-0'>" . $result->num_rows . "</p>";
                ?>
                <small>Joueurs Disponible</small>
              </div>
              <div class="col playerBlesse">
                <i class="fas fa-user-injured fa-2x"></i>
                <?php
                  $sql = "SELECT * FROM joueur where sante='blesse'";
                  $result = $bd->query($sql);
                  echo "<p class='mt-2 mb-0'>" . $result->num_rows . "</p>";
                ?>
                <small>Joueurs Blesse</small>
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
                        echo   "
                              <form method='POST' class='d-inline'>
                                <input required type='hidden' name='id' value='" . $row1["id"] . "'>
                                <button type='submit' name='demarreM' class='btn btn-success btn-sm mr-2'>Demarre le match</button>
                              </form>
                            
                              </li>";
                        }else if($row1["status"]=="en cour"){
                        echo   "<div class='status'><i class='fas fa-spinner fa-spin text-danger'></i></div>";
                        echo   "
                                  <input required type='hidden' name='id' value='" . $row1["id"] . "'>
                                
                                  <button type='submit' name='editM' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#majMatch" . $row1["id"] . "'>Mettre le resultat</button>
                              </li>";
                        }else if($row1["status"]=="termine"){
                        echo   "<div class='status'><i class='fas fa-check-circle text-success'></i></div>";

                        }
                        
                  }
                  } else {
                      echo "Pas de matchs";
                  }
                ?>
              </ul>
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
                  $sql = "SELECT * FROM joueur WHERE sante='forme'";
                  $result = $bd->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='row mb-3'>
                                <div class='col-2'>" . $row["prenom"] ."</div>
                                <div class='col-2'>" . $row["nom"] . "</div>
                                <div class='col-2'>" . $row["numero"] . "</div>
                                <div class='col-2'>" . $row["poste"] . "</div>
                                <div class='col-3'>
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

            </div>
            <div class="row status-row playerBlesse">
              <div class="col-12" id="playerBlesse">
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
                  $sql = "SELECT * FROM joueur WHERE sante='blesse'";
                  $result = $bd->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='row mb-3'>
                                <div class='col-2'>" . $row["prenom"] ."</div>
                                <div class='col-2'>" . $row["nom"] . "</div>
                                <div class='col-2'>" . $row["numero"] . "</div>
                                <div class='col-2'>" . $row["poste"] . "</div>
                                <div class='col-3'>
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

            </div>
            <div class="row status-row entrainement">
              <ul class="trainer-list"  >
              <?php 
                  $sql1 = "SELECT * FROM entrainement ORDER BY date DESC";
                  $result1 = $bd->query($sql1);
                  if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        echo "
                        <li class='trainer'>
                        <div class='avatar text-light'><i class='fa-2x'><img src='../images/trainer.png' alt='' sizes='' srcset=''></i></div>
                        <div class='trainer-content'><h5>Entraînement</h5><p>" .$row1["type"] . "</p></div>
                        <div class='time'>" .$row1["date"] . "</div>";
                        if($row1["status"]=="a venir"){
                          echo   "<div class='status'><i class='fas fa-long-arrow-alt-right'></i></div>";
                          echo   "
                                <form method='POST' class='d-inline'>
                                  <input required type='hidden' name='id' value='" . $row1["id"] . "'>
                                  <button type='submit' name='demarreE' class='btn btn-success btn-sm mr-2'>Demarre l'entrainement</button>
                                </form>
                                <form method='POST' class='d-inline'>
                                <input required type='hidden' name='id' value='" . $row1["id"] . "'>
                                <button type='submit' name='deleteE' class='btn btn-danger btn-sm mr-2'>Supprimer</button>
                              </form>
                                </li>";
                          }else if($row1["status"]=="en cour"){
                          echo   "<div class='status'><i class='fas fa-spinner fa-spin text-danger'></i></div>";
                          echo   "
                          <form method='POST' class='d-inline'>
                                    <input required type='hidden' name='id' value='" . $row1["id"] . "'>
                                    <button type='submit' name='majE' class='btn btn-primary btn-sm' >Terminer entrainement</button></form>
                                </li>";
                          }else if($row1["status"]=="termine"){
                          echo   "<div class='status'><i class='fas fa-check-circle text-success'></i></div></li>";
                            
                          }
                        
                  }
                  } else {
                      echo "Pas d'entrainement";
                  }
                ?>
              </ul>
              <div class="text-left">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterEntrainement">Ajouter un entrainement</button>
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
          <form action="" method="post">
            <div class="form-group">
              <input required type="text" name="type" placeholder="Type"><br>
              <input required type="datetime-local" name="date" placeholder="Date et heure"><br>
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
  <?php
  $sql = "SELECT * FROM matchs";
  $result = $bd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
echo  "<div class='modal fade' id='majMatch" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='majMatch" . $row["id"] . "' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='modifierMatch'>Real Madrid VS " . $row["adversaire"] . "</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <form action='' method='post'>
                <div class='form-group'>
                <input required readonly value='" . $row["tournoi"] . "' type='text' name='butE' placeholder='But de l'equipe'>
                <input required readonly value='Journee " . $row["journee"] . "' type='text' name='butE' placeholder='But de l'equipe'>
                <input required value='" . $row["butE"] . "' type='number' name='butE' placeholder=''>
                  <input required value='" . $row["butA"] . "' type='number' name='butA' placeholder=''>
                  <input required type='hidden' name='id' value='" . $row["id"] . "'>
                  <input required type='submit' class='btn btn-primary' name='updateM' value='Terminer le match'>
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
                  <input readonly value='" . $row["prenom"] . "' required type='text' name='prenom' placeholder='Prenom'>
                  <input readonly value='" . $row["nom"] . "' required type='text' name='nom' placeholder='Nom'><br>
                  <input readonly value='" . $row["poste"] . "' required type='text' name='poste' placeholder='Poste'>
                  <input readonly value='" . $row["numero"] . "' required type='number' name='numero' placeholder='Numero'><br>
                  <label>Sante
                  <select name='sante'>
                  <option value='forme'>Forme</option>
                  <option value='blesse'>Blesse</option>
                 </select><br>
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
  $sql = "SELECT * FROM entrainement";
  $result = $bd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
echo  "<div class='modal fade' id='modifierEntrainement" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='modifierEntrainement" . $row["id"] . "' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='modifierEntrainement'>Modifier cette entrainement</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <form action='' method='post'>
                <div class='form-group'>
                  <input required type='text' name='type' placeholder='Type' value='" . $row["type"] . "'><br>
                  <input required type='datetime-local' name='date' placeholder='Date et heure' value='" . $row["date"] . "'><br>
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
                  SET butE = ?, butA = ?, status = 'termine'
                  WHERE id = ?";
                $stmt = $bd->prepare($sql);
            
                if ($stmt) {
                    // Lier les paramètres
                    $stmt->bind_param(
                        "sss",
                        $_POST['butE'],
                        $_POST['butA'],
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
                  SET sante = ?
                  WHERE id = ?";
                $stmt = $bd->prepare($sql);
            
                if ($stmt) {
                    // Lier les paramètres
                    $stmt->bind_param(
                        "ss",
                        $_POST['sante'],
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