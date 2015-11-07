<?php
    include("api.utils.php");
    
    $TeamManager = new TeamManager($bdd);
    $PlayerManager = new PlayerManager($bdd);
    $GameManager = new GameManager($bdd);
    
    if (isset($_GET['id'])) {
        $tm = $TeamManager->get($_GET['id']);
        $tm->setPlayers($PlayerManager->getForTeam($tm->getId()));
        $tm->setGames($GameManager->getForTeam($tm->getId()));
        echo json_encode($tm);   
    } else {
        echo json_encode($TeamManager->getAllByName());
    }