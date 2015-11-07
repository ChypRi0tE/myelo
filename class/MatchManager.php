<?php
  class MatchManager {
    private $_bdd;

    public function __construct($bdd) {
      $this->_bdd = $bdd;
    }

    public function delete($id) {
        $this->_bdd->exec('DELETE FROM lol_matches WHERE matchId = '. $id);
    }
    
    public function get($id) {
      $q = $this->_bdd->query('SELECT * FROM lol_matches WHERE matchId = '.$id);
      $data = $q->fetch();
        if ($data == null) {return null;}
      return new Match($data);
    }

      public function getReal($id) {
          $q = $this->_bdd->query('SELECT * FROM lol_matches WHERE realId = '.$id);
          $data = $q->fetch();
          if ($data == null) {return null;}
          return new Match($data);
      }

    public function add(Match $gm) {
        $old = $this->get($gm->getMatchId());
        if ($old != null && ($gm->getSummonerId() != $old->getSummonerId())) {
            $gm->setRealId($gm->getMatchId());
            $old = $this->getReal($gm->getMatchId());
            if ($old != null && ($gm->getSummonerId() != $old->getSummonerId())) {
                $gm->setMatchId(0000000000 + rand(1, 999999999));
            }
        }
        $query= "INSERT INTO lol_matches ("
                . "matchId, summonerId, matchType, matchDuration, matchCreation, victory, championId, teamId, spell1, spell2, link, realId"
                . ") VALUES ("
                . "'".$gm->getMatchId()."',"
                . "'".$gm->getSummonerId()."',"
                . "'".$gm->getMatchType()."',"
                . "'".$gm->getMatchDuration()."',"
                . "'".$gm->getMatchCreation()."',"
                . "'".$gm->getVictory()."',"
                . "'".$gm->getChampionId()."',"
                . "'".$gm->getTeamId()."',"
                . "'".$gm->getSpell1()."',"
                . "'".$gm->getSpell2()."',"
                . "'".$gm->getLink()."',"
                . "'".$gm->getRealId()."' )";

        $this->_bdd->query($query);
      debug("Match added to the database.");
    }

    public function getLast($nb) {
      $games = [];
      $q = $this->_bdd->query('SELECT * FROM lol_matches ORDER BY matchCreation DESC LIMIT '.$nb);
      while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
        $games[] = new Match($data);
      }
      return $games;
    }

    public function getAll() {
      $games = [];
      $q = $this->_bdd->query('SELECT * FROM lol_matches ORDER BY matchCreation DESC');
      while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
        $games[] = new Match($data);
      }
      return $games;
    }
  };
?>