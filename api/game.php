<?php
    include("api.utils.php");
    $GameManager = new GameManager($bdd);
    $TeamManager = new TeamManager($bdd);

    if (isset($_GET['id'])) {
        echo json_encode($GameManager->get($_GET['id']));
    } else if (isset($_GET['team'])) {
        echo json_encode($GameManager->getForTeam($_GET['team']));
    } else if (isset($_GET['last'])) {
        echo json_encode($GameManager->getLast($_GET['last']));
    } else {
        echo json_encode($GameManager->getAll());
    }