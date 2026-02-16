<?php
require 'config.php';

if (empty($_SESSION['name']) || empty($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support - Google Login</title>
    
</head>
<body>
    <div class="container">
        <h1>Welcome to Support!</h1>
        <div>
            <p>Name: <?php echo htmlspecialchars($_SESSION['name']); ?></p>
            <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        </div>
        <hr>
        <p>You have successfully logged in with your Google Account.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
