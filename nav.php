<?php

$sql = 'SELECT * FROM userdata WHERE id=?;';
$usersearch = $pdo->prepare($sql);
$usersearch->execute([$_SESSION["id"]]);
$user = $usersearch->fetch();

if ($user["route"] == "lang") {
    $aantal = 11;
} else {
    $aantal = 7;
}
?>
<nav>
    <h4>Punt <?= $user["checkpoint"] ?> van <?= $aantal ?></h4>
    <a href="logout.php">Uitloggen</a>
</nav>