<?php

session_start();
if(!empty($_SESSION['email'])){
    header("Location: http://localhost/gef/admin");
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
        $req="SELECT * FROM administrateur WHERE email='$email' AND password='$password' ";
        $exec=mysqli_query($bd,$req);
        $array=mysqli_fetch_array($exec,MYSQLI_ASSOC);
        if (is_array($array)) {
            $_SESSION["email"]=$email;
            $_SESSION["id"]=$array['id'];
            $_SESSION["role"]='admin';
            header("Location: http://localhost/gef/admin");
        }else {
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
