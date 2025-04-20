<?php

$host = "localhost";
$user = "root"; 
$pass = "";     
$dbname = "gestion_clients";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// === INSERT ===
if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $sql = "INSERT INTO clients (nom, prenom, email, telephone) 
            VALUES ('$nom', '$prenom', '$email', '$telephone')";
    $conn->query($sql);
    header("Location: list.php");
    exit();
}

// === DELETE ===
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM clients WHERE id = $id");
    header("Location: list.php");
    exit();
}

// === UPDATE ===
if (isset($_POST['modifier'])) {
    $id = intval($_POST['id']);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $sql = "UPDATE clients 
            SET nom='$nom', prenom='$prenom', email='$email', telephone='$telephone' 
            WHERE id=$id";
    $conn->query($sql);
    header("Location: list.php");
    exit();
}
