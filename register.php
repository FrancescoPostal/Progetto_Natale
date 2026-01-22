<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>🎄 Registrazione 🎄</h1>

<form action="php/register_handler.php" method="POST">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Registrati</button>
</form>

<p><a href="login.php">Hai già un account? Accedi</a></p>
<p><a href="index.php">Torna alla home</a></p>

<script src="js/validation.js"></script>
</body>
</html>