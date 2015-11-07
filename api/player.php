<?php
    include("api.utils.php");

    $TeamManager = new TeamManager($bdd);
    $PlayerManager = new PlayerManager($bdd);

    if (isset($_GET['id'])) {
        echo json_encode($PlayerManager->get($_GET['id']));
    } else if (isset($_GET['team'])) {
        echo json_encode($PlayerManager->getForTeam($_GET['team']));
    } else if (isset($_GET['last'])) {
        echo json_encode($PlayerManager->getLast($_GET['last']));
    } else {
        echo json_encode($PlayerManager->getAll());
    }
?>