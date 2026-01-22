<?php
session_start();
require_once 'db_config.php';

//Prende i dati dal form per il login
$email = $_POST["email"] ?? '';
$password = $_POST["password"] ?? '';

if(!$email || !$password) {
    echo "<h2>Compila tutti i campi!</h2>";
    echo "<p><a href='../login.php'>Riprova</a></p>";
    exit();
}

//Sempre la connessione al database
$pdo = getDBConnection();

//Cerca l'utente all'interno del database database
$stmt = $pdo->prepare("SELECT * FROM utenti WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

// verifica della password
if($user && $user['password'] === $password) {
    $_SESSION["user"] = $user['nome'];
    $_SESSION["user_id"] = $user['id'];
    header("Location: ../index.php");
    exit();
} else {
    //Mostra il messaggio di errore in caso di credenziali errate
    echo "<h2>Email o password errati</h2>";
    echo "<p><a href='../login.php'>Riprova</a></p>";
}
?>