<?php
    include("api.utils.php");
    $api = new RiotApi('euw');

if (isset($_GET['champion'])) {
    echo json_encode(new Champion($_GET['champion']));
} else if (isset($_GET['summoner'])) {
    echo json_encode(new Summoner($_GET['summoner']));
}