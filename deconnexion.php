<?php
session_start(); // On démarre la session AVANT toute chose
session_destroy(); // On détruit la session et donc l'utilisateur
require('page_connexion.php'); // On redirige vers la page de connexion
?>