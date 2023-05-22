<?php

// Excelsior Woerden
$point[0][0]["latmax"] = 52.0833790;
$point[0][0]["longmin"] = 4.8879139;
$point[0][0]["latmin"] = 52.0830907;
$point[0][0]["longmax"] = 4.8884325;

// Snellerpoort
$point[0][1]["latmax"] = 52.0894826;
$point[0][1]["longmin"] = 4.9071172;
$point[0][1]["latmin"] = 52.08902307013614;
$point[0][1]["longmax"] = 4.912124833435315;

// Vijverbos
$point[0][2]["latmax"] = 52.1022703;
$point[0][2]["longmin"] = 4.9569181;
$point[0][2]["latmin"] = 52.1005253;
$point[0][2]["longmax"] = 4.9675493;

// Kasteel de Haar
$point[0][3]["latmax"] = 52.1225696;
$point[0][3]["longmin"] = 4.9827253;
$point[0][3]["latmin"] = 52.119084130891785;
$point[0][3]["longmax"] = 4.990247233983838;

// Klein Limburg
$point[0][4]["latmax"] = 52.1326908;
$point[0][4]["longmin"] = 4.9849984;
$point[0][4]["latmin"] = 52.13045870989011;
$point[0][4]["longmax"] = 4.9886978229502;

// Kockengen
$point[0][5]["latmax"] = 52.15401576247991;
$point[0][5]["longmin"] = 4.938566310736337;
$point[0][5]["latmin"] = 52.1459512;
$point[0][5]["longmax"] = 4.9619331;

// Grutto
$point[0][6]["latmax"] = 52.1477154645099;
$point[0][6]["longmin"] = 4.920750885996034;
$point[0][6]["latmin"] = 52.1458370;
$point[0][6]["longmax"] = 4.9245425;

// Kameryck
$point[0][7]["latmax"] = 52.130306;
$point[0][7]["longmin"] = 4.900741;
$point[0][7]["latmin"] = 52.128208;
$point[0][7]["longmax"] = 4.908882;

// De Schulenburg
$point[0][8]["latmax"] = 52.11560560955744;
$point[0][8]["longmin"] = 4.89181102016156;
$point[0][8]["latmin"] = 52.1143377;
$point[0][8]["longmax"] = 4.8942855;

// Excelsior Woerden
$point[0][9]["latmax"] = 52.0833790;
$point[0][9]["longmin"] = 4.8879139;
$point[0][9]["latmin"] = 52.0830907;
$point[0][9]["longmax"] = 4.8884325;

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
$point[1][2]["latmax"] = 52.083564;
$point[1][2]["longmin"] = 4.931220;
$point[1][2]["latmin"] = 52.082525;
$point[1][2]["longmax"] = 4.938014;

// Spoorwegovergang Harmelen
$point[1][3]["latmax"] = 52.1010478;
$point[1][3]["longmin"] = 4.9392849;
$point[1][3]["latmin"] = 52.1002296;
$point[1][3]["longmax"] = 4.9417237;

// Kameryck
$point[1][4]["latmax"] = 52.130306;
$point[1][4]["longmin"] = 4.900741;
$point[1][4]["latmin"] = 52.128208;
$point[1][4]["longmax"] = 4.908882;

// De Schulenburg
$point[1][5]["latmax"] = 52.115811;
$point[1][5]["longmin"] = 4.891671;
$point[1][5]["latmin"] = 52.113756;
$point[1][5]["longmax"] = 4.894655;

// Excelsior Woerden
$point[1][6]["latmax"] = 52.0833790;
$point[1][6]["longmin"] = 4.8879139;
$point[1][6]["latmin"] = 52.0830907;
$point[1][6]["longmax"] = 4.8884325;

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
