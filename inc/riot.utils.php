<?php
$api = new RiotApi('euw');

function  recordLastGames($id) {
    global $api, $bdd;
    $history = $api->getMatchHistory($id);
    $mmgr = new MatchManager($bdd);
    foreach($history as $game) {
        $data = [];
        $data['matchId'] = $game['matchId'];
        $data['summonerId'] = $game['participantIdentities'][0]['player']['summonerId'];
        $data['victory'] = $game['participants'][0]['stats']['winner'] ? '1' : '0';
        $data['matchDuration'] = $game['matchDuration'];
        $data['matchCreation'] = $game['matchCreation'];
        $data['matchType'] = $game['queueType'];
        $data['championId'] = $game['participants'][0]['championId'];
        $data['teamId'] = $game['participants'][0]['teamId'];
        $data['spell1'] = $game['participants'][0]['spell1Id'];
        $data['spell2'] = $game['participants'][0]['spell2Id'];
        $data['link'] = getMatchLink($game['participantIdentities'][0]['player']['matchHistoryUri'], $game['matchId']);
        if($game['season'] != "PRESEASON2015") {
          $gm = new Match($data);
          $mmgr->add($gm);
        }
    }
}

function getSide($teamid) {
    if ($teamid == 100) {
        return '<span style="color:blue">Blue</span>';
    } else {
        return '<span style="color:purple">Purple</span>';
    }
}

function getMatchLink($summonerlink, $matchId) {
  return "http://matchhistory.euw.leagueoflegends.com/en/#match-details/EUW1/" . $matchId . "/" . substr($summonerlink, 30);
}

function deleter($id) {
    global $bdd;
    $mgr = new MatchManager($bdd);
    $mgr->delete($id);
}