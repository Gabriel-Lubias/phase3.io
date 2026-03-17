<?php
    include "connexion.php";

    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if($password !== $confirm_password) {
            echo "Les mots de passe ne correspondent pas.<br>";
            echo "<a href='creer_un_compte.html'>Retour au formulaire</a>";
            exit();
        }
        if(strlen($password) < 6) {
            echo "Le mot de passe est trop court.<br>";
            echo "<a href='creer_un_compte.html'>Retour au formulaire</a>";
            exit();
        }
        $mdp = password_hash($password, PASSWORD_DEFAULT);
        try {
            $check = $bdd->prepare("SELECT COUNT(*) FROM client WHERE MailClient = ?");
            $check->execute([$email]);
            if($check->fetchColumn() > 0) {
                echo "Cet email est déjà utilisé.<br>";
                echo "<a href='creer_un_compte.html'>Retour au formulaire</a>";
                exit();
            }
            $req = $bdd->prepare("INSERT INTO client (NomClient, PrenomClient, MailClient, MdpClient) VALUES (?, ?, ?, ?)");
            $req->execute([$nom, $prenom, $email, $mdp]);
            echo "Compte créé avec succès !<br>";
            echo "<a href='se_connecter.html'>Se connecter</a>";
        } catch(Exception $e) {
            echo "Erreur lors de la création du compte : " . $e->getMessage() . "<br>";
            echo "<a href='creer_un_compte.html'>Retour au formulaire</a>";
        }
    } else {
        echo "Tous les champs sont requis.<br>";
        echo "<a href='creer_un_compte.html'>Retour au formulaire</a>";
    }
?>