<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 21/03/2015
 * Time: 04:03
 */
include("api.utils.php");

$TeamManager = new TeamManager($bdd);
$tm = $TeamManager->getAllByRating();
echo json_encode($tm);