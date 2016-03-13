<?php
    set_include_path($_SERVER['DOCUMENT_ROOT'] . "/myelo/");
    include_once("inc/connect.php");
    include_once("Model/Beans/Team.php");
    include_once("Model/Beans/Player.php");
    include_once("Model/Beans/Game.php");
    include_once("Model/Managers/TeamManager.php");
    include_once("Model/Managers/PlayerManager.php");
    include_once("Model/Managers/GameManager.php");
    include_once("Model/Riot/RiotApi.php");
    include_once("Model/Riot/Champion.php");
    include_once("Model/Riot/Summoner.php");

    function getTeamName($id) {
        global $bdd;
        $q = $bdd->query('SELECT name FROM elo_teams WHERE id = '.$id);
        return $q->fetch()[0];
    }

    function getPlayerRank($league, $div) {
        if ($league == "MASTER" || $league == "CHALLENGER" || $league == "UNRANKED")
            return ucfirst(strtolower($league));
        else
            return ucfirst(strtolower($league)) . " " . $div;
    }
