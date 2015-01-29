<?php namespace Riot;
$api = new RiotApi('euw');

function  recordLastGames($id) {
    global $api, $bdd;
    $history = $api->getMatchHistory($id);
    $data = [];
    $mmgr = new MatchManager($bdd);
    foreach($history as $game) {
        $data = [];
        $data['matchId'] = $game['matchId'];
        $data['matchDuration'] = $game['matchDuration'];
        $data['matchCreation'] = $game['matchCreation'];
        $data['matchType'] = $game['queueType'];
        $data['championId'] = $game['participants'][0]['championId'];
        $data['teamId'] = $game['participants'][0]['teamId'];
        $data['spell1'] = $game['participants'][0]['spell1Id'];
        $data['spell2'] = $game['participants'][0]['spell2Id'];
        $gm = new Match($data);
        $mmgr->add($gm);
    }
}

function getSide($teamid) {
    if ($teamid == 100) {
        return '<span style="color:blue">Blue</span>';
    } else {
        return '<span style="color:purple">Purple</span>';
    }
}
?>