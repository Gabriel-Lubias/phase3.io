<?php
    try{
        $bdd = new PDO(
            "mysql:host=localhost;dbname=bdd_pop_culture;charset=utf8",
            "glubias",
            "azerty"
        );
    }catch(Exception $e){
        die("Erreur : ".$e->getMessage());
    }
?>