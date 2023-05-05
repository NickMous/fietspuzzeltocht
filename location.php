<?php

$vraag["kort"][1] = "schulenburg";
$vraag["kort"][2] = "kameryck";
$vraag["kort"][3] = "breeveld";
$vraag["kort"][4] = "harmelen herdenking";
$vraag["kort"][5] = "excapepool";
$vraag["kort"][6] = "cattenbroekerplas";
$vraag["kort"][7] = "excelsior";

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
    <p class="location"><?= $vraag[$user["route"]][$user["checkpoint"]] ?></p>
    <button onclick="check(<?= $user["checkpoint"] ?>, <?= $route ?>, <?= $user["id"] ?>);">check</button>
    <p id="errors" class="errormsg"></p>
    <?php require "footer.php" ?>
</body>

</html>