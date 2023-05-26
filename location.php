<?php

$vraag["kort"][1] = "Cattenbroekerplas is een geweldige plek om even te zonnebaden, in het water te gaan en allemaal andere dingen te doen. En dat in Woerden! 
Tijd om hier naartoe te fietsen, en de volgende vraag daar te maken!";
$vraag["kort"][2] = "De escapepool is iets bijzonders op zich! Het is een uniek concept, wat je amper tegenkomt. Misschien iets voor op de bucketlist... Ach ja, er 
valt nog zoveel leuks te doen. Maar dit is ook leuk, dus gaan we door naar de escapepool om even van buitenaf te kijken en een vraag te maken!";
$vraag["kort"][3] = "De treinramp in Harmelen is nu al een tijdje geleden, maar nog lang niet vergeten! Op dit monument staan echt veel namen van wie er zijn omgekomen.
 Kijk zometeen maar als jullie daar zijn. Maar om af te wijken van hetgeen wat niet leuk is, fietsen we daarheen en maken we de volgende vraag!";
$vraag["kort"][4] = "Ah, daar is het dan, de verdiende rust! De omgeving hier is rustig, en ideaal om even doorheen te lopen. Maar op dit punt zitten ook twee mensen voor 
jullie klaar met wat drinken. Dus vertrek met zijn allen naar het Oortjespad, en zij zullen ergens daar zitten met wat drinken voor jullie! Als er een ander groepje is, mogen jullie best samen verder fietsen.
 Ter hoogte van de speeltuin, bij de picknicktafels zitten ze!";
$vraag["kort"][5] = "Het is net Milandhof, maar dan anders! Veelzijdig, in een klein dorpje en toch heel actief. Muziekvereniging Nieuw Leven Kamerik huist zich hier, 
en wat mensen van Excelsior kennen deze mensen behoorlijk goed. Laten we weer gezellig doorfietsen naar de Schulenburg om hierna naar de laatste locatie te gaan!";
$vraag["kort"][6] = "Ah, samen uit samen thuis. Is het niet? Voor veel mensen van de vereniging is dit een huis waar veel herinneringen aan zitten. Alle muziek die we samen 
maken, de feesten en de gekke dagen, en dat al heel wat jaren! Tijd om de route af te sluiten, en dus naar het clubhuis te gaan! Zodra jullie zijn aangekomen, klik 'check locatie' 
nog even voor de laatste keer, en dan stopt de tijd!";

$vraag["lang"][1] = "De tijden van de promsconcert in de sporthal... Wat een drukte! Maar wel leuke herinneringen die we komende jaren weer gaan oppakken. Voor nu genieten we even van de zon, en gaan we lekker naar de sporthal!";
$vraag["lang"][2] = "Groot is het ook weer niet, maar heerlijk om even doorheen te lopen. Even genieten van de rust en weg van de wereld. Huppa, op naar de rust in de vijverbos!";
$vraag["lang"][3] = "Kastelen blijven wel één van de best bewaarde historische dingen. Tegenwoordig zijn de meesten allemaal opengesteld voor bezoekers, maar ook voor evenementen. Elfia is laatst geweest, 
en dat hier in Kasteel de Haar. Een wereld vol fantasiekostuums en kraampjes met dingen die erbij horen. Nou is dit natuurlijk niet iets wat iedereen leuk vindt, maar het uiterlijk van het kasteel is wel mooi. Laten we erheen gaan om 
het kasteel te bekijken!";
$vraag["lang"][4] = "Of het nou 'Bestel Mar' is of 'De Peel in Brand', er blijft een zuids accent inzitten in de muziek van Rowwen Hèze. Waar we nu heen gaan is niet echt limburg natuurlijk, maar wederom wel weer een mooie locatie om even 
rond te lopen. Vanaf deze locatie kan je misschien ook het kasteel nog een beetje zien! Laten we gaan naar Klein Limburg!";
$vraag["lang"][5] = "Een kleine stad met nog steeds een mooie omgeving! Last gehad van het water, maar er prima uit hersteld. Kockengen heeft maar liefst een oppervlakte van 20km2, wat nog best groot is voor een klein dorp.
 In de gebieden worden wel veel proeven gedaan door universiteiten, uit Utrecht, Amsterdam en ga zo door. Laten we van de rust genieten in Kockengen!";
$vraag["lang"][6] = "Leuke, kleine vogeltjes die niet meer dan 300 gram wegen. Helaas zijn ze amper meer te vinden in Nederland, door alles dat gebouwd wordt en de landbouw dat vrij groot is. De vogeltjes 
zijn hier ook niet in de buurt te vinden helaas, maar het park is er wel naar vernoemd. Laten we naar Park de Grutto gaan.";
$vraag["lang"][7] = "Ah, daar is het dan, de verdiende rust! De omgeving hier is rustig, en ideaal om even doorheen te lopen. Maar op dit punt zitten ook twee mensen voor 
jullie klaar met wat drinken. Dus vertrek met zijn allen naar het Oortjespad, en zij zullen ergens daar zitten met wat drinken voor jullie! Als er een ander groepje is, mogen jullie best samen verder fietsen.
 Ter hoogte van de speeltuin, bij de picknicktafels zitten ze!";
$vraag["lang"][8] = "Het is net Milandhof, maar dan anders! Veelzijdig, in een klein dorpje en toch heel actief. Muziekvereniging Nieuw Leven Kamerik huist zich hier, 
en wat mensen van Excelsior kennen deze mensen behoorlijk goed. Laten we weer gezellig doorfietsen naar de Schulenburg om hierna naar de laatste locatie te gaan!";
$vraag["lang"][9] = "Ah, samen uit samen thuis. Is het niet? Voor veel mensen van de vereniging is dit een huis waar veel herinneringen aan zitten. Alle muziek die we samen 
maken, de feesten en de gekke dagen, en dat al heel wat jaren! Tijd om de route af te sluiten, en dus naar het clubhuis te gaan! Zodra jullie zijn aangekomen, klik 'check locatie' 
nog even voor de laatste keer, en dan stopt de tijd!";

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
        <div id="errors"></div>
        <p id="errors" class="errormsg"></p>
    </div>
    <?php require "footer.php" ?>
</body>

</html>