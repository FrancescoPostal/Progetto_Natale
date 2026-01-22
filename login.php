<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>🎄 Login 🎄</h1>

<form action="php/auth.php" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Accedi</button>
</form>

<p><a href="register.php">Non hai un account? Registrati</a></p>
<p><a href="index.php">Torna alla home</a></p>

<script src="js/validation.js"></script>
</body>
</html>