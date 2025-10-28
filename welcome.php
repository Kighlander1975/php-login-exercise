<?php
// Session starten
session_start();

// Überprüfen, ob der Benutzer eingeloggt ist
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Willkommen</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .welcome-container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
        }
        
        .welcome-box {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            text-align: center;
        }
        
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        
        .welcome-message {
            color: #666;
            margin-bottom: 30px;
            font-size: 18px;
        }
        
        .btn-logout {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .btn-logout:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-box">
            <h1>Willkommen, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
            <p class="welcome-message">Sie haben sich erfolgreich angemeldet.</p>
            <a href="logout.php" class="btn-logout">Abmelden</a>
        </div>
    </div>
</body>
</html>