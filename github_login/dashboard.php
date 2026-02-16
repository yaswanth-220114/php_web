<?php
session_start();

if (empty($_SESSION['github_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitHub Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .profile {
            text-align: center;
        }
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 20px auto;
            border: 3px solid #333;
        }
        .info {
            margin: 20px 0;
            text-align: left;
        }
        .label {
            font-weight: bold;
            color: #333;
            display: inline-block;
            width: 100px;
        }
        .value {
            color: #666;
        }
        .logout {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 30px;
            background: #d32f2f;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }
        .logout:hover {
            background: #b71c1c;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>GitHub Dashboard</h1>
        
        <div class="profile">
            <?php if (!empty($_SESSION['github_avatar'])): ?>
                <img src="<?php echo htmlspecialchars($_SESSION['github_avatar']); ?>" alt="Avatar" class="avatar">
            <?php endif; ?>
            
            <div class="info">
                <div>
                    <span class="label">Name:</span>
                    <span class="value"><?php echo htmlspecialchars($_SESSION['github_name'] ?? 'N/A'); ?></span>
                </div>
            </div>
            
            <div class="info">
                <div>
                    <span class="label">Login:</span>
                    <span class="value">@<?php echo htmlspecialchars($_SESSION['github_login']); ?></span>
                </div>
            </div>
            
            <div class="info">
                <div>
                    <span class="label">Email:</span>
                    <span class="value"><?php echo htmlspecialchars($_SESSION['github_email'] ?? 'Private'); ?></span>
                </div>
            </div>
            
            <div class="info">
                <div>
                    <span class="label">ID:</span>
                    <span class="value"><?php echo htmlspecialchars($_SESSION['github_id']); ?></span>
                </div>
            </div>
        </div>
        
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
