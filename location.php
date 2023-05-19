<?php

$vraag["kort"][1] = "Cattenbroekerplas is een geweldige plek om even te zonnebaden, in het water te gaan en allemaal andere dingen te doen. En dat in Woerden! 
Tijd om hier naartoe te fietsen, en de volgende vraag daar te maken!";
$vraag["kort"][2] = "De escapepool is iets bijzonders op zich! Het is een uniek concept, wat je amper tegenkomt. Misschien iets voor op de bucketlist... Ach ja, er 
valt nog zoveel leuks te doen. Maar dit is ook leuk, dus gaan we door naar de escapepool om even van buitenaf te kijken en een vraag te maken!";
$vraag["kort"][3] = "De treinramp in Harmelen is nu al een tijdje geleden, maar nog lang niet vergeten! Op dit monument staan echt veel namen van wie er zijn omgekomen.
 Kijk zometeen maar als jullie daar zijn. Maar om af te wijken van hetgeen wat niet leuk is, fietsen we daarheen en maken we de volgende vraag!";
$vraag["kort"][4] = "Ah, daar is het dan, de verdiende rust! De omgeving hier is rustig, en ideaal om even doorheen te lopen. Maar op dit punt zitten ook twee mensen voor 
jullie klaar met wat drinken. Dus vertrek met zijn allen naar het Oortjespad, en zij zullen ergens daar zitten met wat drinken voor jullie! Ter hoogte van de speeltuin, bij de 
picknicktafels!";
$vraag["kort"][5] = "Het is net Milandhof, maar dan anders! Veelzijdig, in een klein dorpje en toch heel actief. Muziekvereniging Nieuw Leven Kamerik huist zich hier, 
en wat mensen van Excelsior kennen deze mensen behoorlijk goed. Laten we weer gezellig doorfietsen naar de Schulenburg om hierna naar de laatste locatie te gaan!";
$vraag["kort"][6] = "Ah, samen uit samen thuis. Is het niet? Voor veel mensen van de vereniging is dit een huis waar veel herinneringen aan zitten. Alle muziek die we samen 
maken, de feesten en de gekke dagen, en dat al heel wat jaren! Tijd om de route af te sluiten, en dus naar het clubhuis te gaan! Zodra jullie zijn aangekomen, klik 'check locatie' 
nog even voor de laatste keer, en dan stopt de tijd!";

$vraag["lang"][1] = "snellerpoort";
$vraag["lang"][2] = "vijverbos";
$vraag["lang"][3] = "Kasteel de Haar";
$vraag["lang"][4] = "Klein Limburg";
$vraag["lang"][5] = "Kockengen";
$vraag["lang"][6] = "Park de Grutto";
$vraag["lang"][7] = "Kameryck";
$vraag["lang"][8] = "Schulenburg";
$vraag["lang"][9] = "Excelsior";

require "connect.php";
$sql = 'SELECT * FROM userdata WHERE id=?;';
$usersearch = $pdo->prepare($sql);
$usersearch->execute([$_SESSION["id"]]);
$user = $usersearch->fetch();
if ($user["QUESTION"] == 1) {
    header("Location: question.php");
}
if ($user["route"] == "kort") {
    $route = 1;
} else {
    $route = 0;
}

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locatie</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts/checkpoints.js"></script>
</head>

<body>
    <?php require "nav.php" ?>
    <div class="flexcommon">
        <h1>Locatie!</h1>
        <p class="location"><?= $vraag[$user["route"]][$user["checkpoint"]] ?></p>
        <button onclick="check(<?= $user["checkpoint"] ?>, <?= $route ?>, <?= $user["id"] ?>);">Check je locatie!</button>
        <p id="errors" class="errormsg"></p>
    </div>
    <?php require "footer.php" ?>
</body>

</html>