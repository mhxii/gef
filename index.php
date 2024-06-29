<?php

session_start();
if(@$_SESSION['role']=='admin'){
    header("Location: http://localhost/gef/admin");
}else if(@$_SESSION['role']=='entraineur'){
    header("Location: http://localhost/gef/entraineur");
}else if(@$_SESSION['role']=='joueur'){
    header("Location: http://localhost/gef/joueur");
}
@$email=$_POST['email'];
@$password=$_POST['password'];
@$submit=$_POST['submit'];

if(isset($submit)){
    if (empty($email) || empty($password)) {
        $error="error";
        $error_content="L'email ou le mot de passe est vide";
    }else {
        require_once('config.php');
        $reqA="SELECT * FROM admin WHERE email='$email' AND password='$password' ";
        $execA=mysqli_query($bd,$reqA);
        $reqE="SELECT * FROM entrain WHERE email='$email' AND password='$password' ";
        $execE=mysqli_query($bd,$reqE);
        $reqJ="SELECT * FROM joueur WHERE email='$email' AND password='$password' ";
        $execJ=mysqli_query($bd,$reqJ);
        $arrayA=mysqli_fetch_array($execA,MYSQLI_ASSOC);
        $arrayE=mysqli_fetch_array($execE,MYSQLI_ASSOC);
        $arrayJ=mysqli_fetch_array($execJ,MYSQLI_ASSOC);
        if (is_array($arrayA)) {
            $_SESSION["email"]=$email;
            $_SESSION["id"]=$arrayA['id'];
            $_SESSION["prenom"]=$arrayA['prenom'];
            $_SESSION["nom"]=$arrayA['nom'];        
            $_SESSION["role"]='admin';
            header("Location: http://localhost/gef/admin");
        }else if (is_array($arrayE)) {
            $_SESSION["email"]=$email;
            $_SESSION["id"]=$arrayE['id'];
            $_SESSION["prenom"]=$arrayE['prenom'];
            $_SESSION["nom"]=$arrayE['nom'];        
            $_SESSION["role"]='entraineur';
            header("Location: http://localhost/gef/entraineur");
        }else if (is_array($arrayJ)) {
            $_SESSION["email"]=$email;
            $_SESSION["id"]=$arrayJ['id'];
            $_SESSION["prenom"]=$arrayJ['prenom'];
            $_SESSION["nom"]=$arrayJ['nom'];        
            $_SESSION["role"]='joueur';
            header("Location: http://localhost/gef/joueur");
        }else{
            $error="error";
            $error_content="L'email ou le mot de passe est incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> -->
</head>
<body>
    <header>
        <div class="logo" >
            <img src="images/logo-equipe.png" alt="Logo de l'équipe">
        </div>
        <div class="contact">
            <a href="#">Contacter ADMIN</a>
        </div>
    </header>

    <main>
        <form action="#" method="post">
            <h1>Connexion</h1>
            <div class="email">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?=$email;?>" >
            </div>
            <div class="password">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="submit">
                <input type="submit" value="Se connecter" name="submit">
            </div>
            <div class="lost-password">
                <a href="#">Vous ne pouvez pas vous connecter ? <br> 
                   <h3> Contacter ADMIN</h3>
                </a>
            </div>
        </form>
        <div class="<?=@$error;?>">
            <?=@$error_content;?>
        </div>
    </main>
    <script src="main.js"></script>
</body>
</html>
