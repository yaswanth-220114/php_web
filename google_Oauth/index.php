<?php
require 'config.php';
$login_url = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Login - Support Page</title>
    
</head>
<body>
    <div class="container">
        <h1>Login to Support</h1>
        <p>Sign in using your Google Account</p>
        <a href="<?php echo htmlspecialchars($login_url); ?>">
            <button style="background: none; border: none; color: white; font-weight: bold; cursor: pointer;">Login with Google</button>
        </a>
    </div>
</body>
</html>
