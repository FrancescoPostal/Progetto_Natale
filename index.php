<?php 
session_start();
require_once 'php/db_config.php';

//Carica le tasks solo se l'utente è loggato
$tasks = [];
if(isset($_SESSION["user_id"])) {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY data_creazione DESC");
    $stmt->execute([$_SESSION["user_id"]]);
    $tasks = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progetto Natale SQL</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>🎄 Benvenuto al Progetto di Natale 🎄</h1>

<?php if(isset($_SESSION["user"])): ?>
    <p>Ciao <strong><?php echo htmlspecialchars($_SESSION["user"]); ?></strong>!</p>
    <a href="logout.php" class="btn">Logout</a>

    <!-- Parte della task list -->
    <div class="todo-container">
        <h2>📝 La tua To-Do List</h2>
        
        <form action="php/add_task.php" method="POST" class="todo-form">
            <input type="text" name="task" placeholder="Nuova attività..." required>
            <button type="submit">Aggiungi</button>
        </form>

        <ul class="todo-list">
            <?php if(empty($tasks)): ?>
                <li class="empty">Nessuna attività. Aggiungine una!</li>
            <?php else: ?>
                <?php foreach($tasks as $task): ?>
                    <li>
                        <span><?php echo htmlspecialchars($task['task']); ?></span>
                        <a href="php/delete_task.php?id=<?php echo $task['id']; ?>" class="delete-btn">❌</a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>

<?php else: ?>
    <p>Effettua il login o registrati per continuare</p>
    <div class="btn-container">
        <a href="login.php" class="btn">Login</a>
        <a href="register.php" class="btn">Registrati</a>
    </div>
<?php endif; ?>

<script src="js/effects.js"></script>
</body>
</html>