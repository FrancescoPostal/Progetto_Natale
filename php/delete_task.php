<?php
session_start();
require_once 'db_config.php';

//controllo per vedere se l'utente è già loggato
if(!isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit();
}

$task_id = $_GET["id"] ?? null;

if($task_id === null) {
    header("Location: ../index.php");
    exit();
}

$pdo = getDBConnection();

//fa si che l'utente possa eliminare solo le proprie task
$stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
$stmt->execute([$task_id, $_SESSION["user_id"]]);

header("Location: ../index.php");
exit();
?>