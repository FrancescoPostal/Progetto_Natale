<?php
session_start();
require_once 'db_config.php';

//controlla se l'utente è loggato
if(!isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit();
}

$task = $_POST["task"] ?? '';

if(!$task) {
    header("Location: ../index.php");
    exit();
}

//Si connette al DataBase
$pdo = getDBConnection();

//inserisce la nuova task
$stmt = $pdo->prepare("INSERT INTO tasks (user_id, task) VALUES (?, ?)");
$stmt->execute([$_SESSION["user_id"], $task]);

header("Location: ../index.php");
exit();
?>