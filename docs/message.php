<?php
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];
    echo "<h1>Vous y êtes presque $nom</h1>";
    echo "<p>Vous souhaitez envoyer un message au sujet de : $sujet";
    echo "<p>Avec cet email : $email";
    echo "<p>Êtes-vous sûr de vouloir envoyer ce message :</p>";
    echo "<p>$message</p>";
?>