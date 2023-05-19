<?php

// Excelsior Woerden
$point[0][0]["latmax"] = 52.0833790;
$point[0][0]["longmin"] = 4.8879139;
$point[0][0]["latmin"] = 52.0830907;
$point[0][0]["longmax"] = 4.8884325;

// Snellerpoort
$point[0][1]["latmax"] = 52.0894826;
$point[0][1]["longmin"] = 4.9071172;
$point[0][1]["latmin"] = 52.0883564;
$point[0][1]["longmax"] = 4.9110121;

// Vijverbos
$point[0][2]["latmax"] = 52.1022703;
$point[0][2]["longmin"] = 4.9569181;
$point[0][2]["latmin"] = 52.1005253;
$point[0][2]["longmax"] = 4.9675493;

// Kasteel de Haar
$point[0][3]["latmax"] = 52.1225696;
$point[0][3]["longmin"] = 4.9827253;
$point[0][3]["latmin"] = 52.1206111;
$point[0][3]["longmax"] = 4.9884008;

// Klein Limburg
$point[0][4]["latmax"] = 52.1326908;
$point[0][4]["longmin"] = 4.9849984;
$point[0][4]["latmin"] = 52.1311960;
$point[0][4]["longmax"] = 4.9871328;

// Kockengen
$point[0][5]["latmax"] = 52.1531473;
$point[0][5]["longmin"] = 4.9471065;
$point[0][5]["latmin"] = 52.1459512;
$point[0][5]["longmax"] = 4.9619331;

// Grutto
$point[0][6]["latmax"] = 52.1468777;
$point[0][6]["longmin"] = 4.9209446;
$point[0][6]["latmin"] = 52.1458370;
$point[0][6]["longmax"] = 4.9245425;

// Kameryck
$point[0][7]["latmax"] = 52.1305357;
$point[0][7]["longmin"] = 4.9095707;
$point[0][7]["latmin"] = 52.1298936;
$point[0][7]["longmax"] = 4.9113420;

// De Schulenburg
$point[0][8]["latmax"] = 52.1150836;
$point[0][8]["longmin"] = 4.8917156;
$point[0][8]["latmin"] = 52.1143377;
$point[0][8]["longmax"] = 4.8942855;

// De Greft
$point[0][9]["latmax"] = 52.0927646;
$point[0][9]["longmin"] = 4.8609453;
$point[0][9]["latmin"] = 52.0911018;
$point[0][9]["longmax"] = 4.8635916;

// Excelsior Woerden
$point[0][10]["latmax"] = 52.0833790;
$point[0][10]["longmin"] = 4.8879139;
$point[0][10]["latmin"] = 52.0830907;
$point[0][10]["longmax"] = 4.8884325;

// Excelsior Woerden
$point[1][0]["latmax"] = 52.0833790;
$point[1][0]["longmin"] = 4.8879139;
$point[1][0]["latmin"] = 52.0830907;
$point[1][0]["longmax"] = 4.8884325;

// Cattenbroekerplas Woerden
$point[1][1]["latmax"] = 52.0809840;
$point[1][1]["longmin"] = 4.9143739;
$point[1][1]["latmin"] = 52.0780500;
$point[1][1]["longmax"] = 4.9228617;

// Duikclub Woerden
$point[1][2]["latmax"] = 52.0840214;
$point[1][2]["longmin"] = 4.9346282;
$point[1][2]["latmin"] = 52.0829080;
$point[1][2]["longmax"] = 4.9371277;

// Spoorwegovergang Harmelen
$point[1][3]["latmax"] = 52.1010478;
$point[1][3]["longmin"] = 4.9392849;
$point[1][3]["latmin"] = 52.1002296;
$point[1][3]["longmax"] = 4.9417237;

// Kameryck
$point[1][4]["latmax"] = 52.1305357;
$point[1][4]["longmin"] = 4.9095707;
$point[1][4]["latmin"] = 52.1298936;
$point[1][4]["longmax"] = 4.9113420;

// De Schulenburg
$point[1][5]["latmax"] = 52.1150836;
$point[1][5]["longmin"] = 4.8917156;
$point[1][5]["latmin"] = 52.1143377;
$point[1][5]["longmax"] = 4.8942855;

// Excelsior Woerden
$point[1][7]["latmax"] = 52.0833790;
$point[1][7]["longmin"] = 4.8879139;
$point[1][7]["latmin"] = 52.0830907;
$point[1][7]["longmax"] = 4.8884325;

$checkpoint = $_REQUEST["point"];
$route = $_REQUEST["route"];
if (
    $_REQUEST["lat"] > $point[$route][$checkpoint]["latmin"] &&
    $_REQUEST["lat"] < $point[$route][$checkpoint]["latmax"] &&
    $_REQUEST["long"] > $point[$route][$checkpoint]["longmin"] &&
    $_REQUEST["long"] < $point[$route][$checkpoint]["longmax"]
) {
    echo true;
} else {
    echo false;
}
