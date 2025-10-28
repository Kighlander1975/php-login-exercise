<?php
// Session starten
session_start();

// Überprüfen, ob Benutzer bereits eingeloggt ist
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: welcome.php");
    exit;
}

// Variablen initialisieren
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Verarbeiten der Formulardaten nach dem Absenden
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Überprüfen, ob Benutzername leer ist
    if (empty(trim($_POST["username"]))) {
        $username_err = "Bitte geben Sie einen Benutzernamen ein.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Überprüfen, ob Passwort leer ist
    if (empty(trim($_POST["password"]))) {
        $password_err = "Bitte geben Sie Ihr Passwort ein.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Anmeldedaten validieren (für Demozwecke einfache Prüfung)
    if (empty($username_err) && empty($password_err)) {
        // Für Demonstrationszwecke: einfache Authentifizierung
        // In einer echten Anwendung würden Sie hier eine Datenbankabfrage verwenden
        if ($username === "admin" && $password === "password123") {
            // Passwort ist korrekt, Session starten
            session_start();

            // Session-Variablen speichern
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;

            // Weiterleitung zur Willkommensseite
            header("location: welcome.php");
        } else {
            // Ungültige Anmeldedaten
            $login_err = "Ungültiger Benutzername oder Passwort.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Anmelden</h2>
            <p>Bitte geben Sie Ihre Anmeldedaten ein.</p>

            <?php
            if (!empty($login_err)) {
                echo '<div class="error-message">' . $login_err . '</div>';
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <label>Benutzername</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" autocomplete="off">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Passwort</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" autocomplete="off">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <div class="btn-container">
                        <button type="submit" class="btn-login">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>