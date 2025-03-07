<?php
$host = "localhost"; // Serveur
$user = "root"; // Nom d'utilisateur MySQL (par défaut root)
$password = ""; // Mot de passe (vide par défaut)
$database = "restaurant"; // Nom de la base de données

$conn = new mysqli($host, $user, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
