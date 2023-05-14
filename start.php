<?php

require "connect.php";
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}
$sql = 'SELECT * FROM userdata WHERE id=?;';
$usersearch = $pdo->prepare($sql);
$usersearch->execute([$_SESSION["id"]]);
$user = $usersearch->fetch();

if ($user["route"] == "kort") {
    $route = 1;
} else {
    $route = 0;
}

if ($user["checkpoint"] > 0) {
    header("Location: question.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De start!</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts/checkpoints.js"></script>
</head>

<body>
    <?php require "nav.php" ?>
    <div class="flexcommon">
        <h1>Een kleine intro...</h1>
        <p>Voor mij is het het eerste jaar om dit soort dingen te organiseren, dus ook een poging om het op andere manieren te doen!</p>
        <p>Deze puzzeltocht is met feedback van sommige leden gegaan, en zal lang niet perfect zijn. Dus geef ook zeker feedback na afloop!</p>
        <h3>Maar:</h3>
        <p>Het voordeel van het online doen is dat we locatie kunnen gebruiken, en kunnen bijhouden hoelang er over gedaan wordt.</p>
        <p>Bij elk punt waar jullie komen, kunnen jullie de locatie laten controleren en kleine puzzels krijgen voor jullie volgende locatie.</p>
        <p>Mochten jullie ergens problemen mee hebben, app of bel Sander! Zijn telefoonnummer staat onderaan elke pagina.</p>
        <p>Bovenaan kunnen jullie zien hoeveel punten jullie al doorheen zijn, en hoeveel punten jullie nog moeten.</p>
        <p>Voor nu gaan we beginnen met het testen van de locatie! Klik de knop om te testen, en om door te gaan. Doet hij het niet, loop naar Sander.</p>
        <button class="check" onclick="check(<?= $user["checkpoint"] ?>, <?= $route ?>, <?= $user["id"] ?>);">Ga door</button>
        <div id="errors"></div>
    </div>
    <?php require "footer.php" ?>
</body>

</html>