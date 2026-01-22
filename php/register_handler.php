<?php
session_start();
require_once 'db_config.php';

$nome = $_POST["nome"] ?? '';
$email = $_POST["email"] ?? '';
$password = $_POST["password"] ?? '';

if (!$nome || !$email || !$password) {
    echo "<h2>Compila tutti i campi!</h2>";
    echo "<p><a href='../register.php'>Torna indietro</a></p>";
    exit();
}

$pdo = getDBConnection();

// Controlla se email già all'interno del database
$stmt = $pdo->prepare("SELECT id FROM utenti WHERE email = ?");
$stmt->execute([$email]);

if($stmt->fetch()) {
    echo "<h2>Email già registrata!</h2>";
    echo "<p><a href='../register.php'>Torna indietro</a></p>";
    exit();
}

//Parte che inserisci nuovo utente
$stmt = $pdo->prepare("INSERT INTO utenti (nome, email, password) VALUES (?, ?, ?)");
$stmt->execute([$nome, $email, $password]);

header("Location: ../login.php");
exit();
?>