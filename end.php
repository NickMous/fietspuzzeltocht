<?php

require "connect.php";
$sql = 'SELECT * FROM userdata WHERE id=?;';
$usersearch = $pdo->prepare($sql);
$usersearch->execute([$_SESSION["id"]]);
$user = $usersearch->fetch();
if ($user["route"] == "kort") {
    $route = 1;
} else {
    $route = 0;
}

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}

if ($user["endtime"] == null) {
    $sql = 'UPDATE userdata SET endtime=? WHERE id=?;';
    $update = $pdo->prepare($sql);
    $update->execute([time(), $_SESSION["id"]]);
}

$sql = 'SELECT * FROM userdata WHERE id=?;';
$usersearch = $pdo->prepare($sql);
$usersearch->execute([$_SESSION["id"]]);
$user = $usersearch->fetch();

$unixtime = $user["endtime"] - $user["starttime"];
$endtime = ceil($unixtime / 60);

if (isset($_POST["comment"])) {
    $sql2 = 'INSERT INTO comments(user, comment) VALUES (?, ?);';
    $comment = $pdo->prepare($sql2);
    $comment->execute([$user["username"], $_POST["comment"]]);
    $sent = 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vraagtijd!</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts/checkpoints.js"></script>
</head>

<body>
    <?php require "nav.php" ?>
    <div class="flexcommon">
        <h1>Het einde!</h1>
        <p>Jullie zijn aan het einde gekomen! De tijd is geregistreerd en jullie eindtijd is:</p>
        <h3><?= $endtime ?> minuten</h3>
        <p>Ik hoop dat jullie een beetje hebben genoten van de tocht!</p>
        <p>Nou zou dit misschien niet helemaal geweest zijn zoals jullie hadden verwacht, maar dat is ook lastig.
            Als jullie nog dingen kwijtwillen (verbeterpuntjes, commentaar, complimentjes, weet-ik-al-niet-wat) kunnen jullie dit hieronder kwijt!</p>
        <p>Anders mag je de website sluiten, en veel plezier nog vandaag!</p>
        <div class="register">
            <form method="post">
                <input type="textarea" name="comment" id="comment" class="comment">
                <input type="submit" value="Verzend!">
            </form>
        </div>
        <?php if (isset($sent)) : ?>
            <p class="msgsuccess">Verzonden!</p>
        <?php endif; ?>
    </div>
    <?php require "footer.php" ?>
</body>

</html>