<?php

require "connect.php";

$msg = 0;

if (isset($_SESSION["logged"])) {
    header("Location: start.php");
}

if (isset($_POST["login"])) {
    $sql = 'SELECT * FROM userdata WHERE username=?;';
    $usersearch = $pdo->prepare($sql);
    $usersearch->execute([$_POST["username"]]);
    $user = $usersearch->fetch();
    if ($user) {
        if ($user["password"] == $_POST["password"]) {
            $_SESSION["id"] = $user["id"];
            $msg = "loginsuccess";
            header("Location: start.php");
        } else {
            $msg = "falsepass";
        }
    } else {
        $msg = "nouserfound";
    }
}
if (isset($_POST["register"])) {
    $sql = 'SELECT * FROM userdata WHERE username=?;';
    $usersearch = $pdo->prepare($sql);
    $usersearch->execute([$_POST["username"]]);
    $user = $usersearch->fetch();
    if ($user == false) {
        $sql = 'INSERT INTO userdata (username, password, route) VALUES (?, ?, ?);';
        $register = $pdo->prepare($sql);
        $register->execute([$_POST["username"], $_POST["password"], $_POST["route"]]);
        $sql = 'SELECT * FROM userdata WHERE username=?;';
        $usersearch = $pdo->prepare($sql);
        $usersearch->execute([$_POST["username"]]);
        $user = $usersearch->fetch();
        if ($user) {
            if ($user["password"] == $_POST["password"]) {
                $_SESSION["id"] = $user["id"];
                $msg = "loginsuccess";
                header("Location: start.php");
            } else {
                $msg = "falsepass";
            }
        } else {
            $msg = "nouserfound";
        }
    }
    $msg = "userexists";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fietspuzzeltocht</title>
    <script src="scripts/index.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="flexcommon fullheight">
        <h1>Welkom!</h1>
        <p>Als je hier nieuw bent, maak even een account aan! Zo niet, welkom terug!</p>
        <div id="buttons">
            <button onclick="showLogin()">Inloggen</button>
            <button onclick="showRegistration()">Registreren</button>
        </div>
        <div class="login invisible">
            <form method="post">
                <label for="username" class="bold">Gebruikersnaam of groepsnaam</label>
                <input type="text" name="username" id="username">
                <label for="password" class="bold">Wachtwoord</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Ga!" name="login" class="bold">
            </form>
        </div>
        <div class="register invisible">
            <form method="post">
                <label for="username" class="bold">Gebruikersnaam of groepsnaam</label>
                <input type="text" name="username" id="username">
                <label for="password" class="bold">Wachtwoord</label>
                <p>Dit wachtwoord hoeft niet heel veilig te zijn, het mag gewoon een leuk zinnetje zijn! Het is er meer zodat andere mensen niet zomaar iets met het account kunnen!</p>
                <input type="password" name="password" id="password">
                <p class="bold">Route:</p>
                <div>
                    <input type="radio" name="route" id="short" value="kort">
                    <label for="short">Korte route (1:00 uur - 1:30 uur)</label>
                </div>
                <div>
                    <input type="radio" name="route" id="long" value="lang">
                    <label for="long">Lange route (2:00 uur - 2:30 uur)</label>
                </div>
                <input type="submit" value="Ga!" name="register" class="bold">
            </form>
        </div>
        <?php if ($msg == "loginsuccess") : ?>
            <p class="msgsuccess">Login is gelukt!</p>
        <?php endif; ?>
        <?php if ($msg == "nouserfound") : ?>
            <p class="msgerror">Er is geen gebruiker gevonden</p>
        <?php endif; ?>
        <?php if ($msg == "falsepass") : ?>
            <p class="errormsg">Het wachtwoord klopt niet</p>
        <?php endif; ?>
        <?php if ($msg == "userexists") : ?>
            <p class="errormsg">Deze gebruiker bestaat al</p>
        <?php endif; ?>
    </div>
</body>

</html>