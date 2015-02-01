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
        if (!$gm->getRealId()) {$gm->setRealId($gm->getMatchId());}
        $q = $this->_bdd->prepare('INSERT INTO lol_matches SET matchId = :matchId, summonerId = :summonerId, victory = :victory, matchType = :matchType, matchDuration = :matchDuration, matchCreation = :matchCreation, championId = :championId, teamId = :teamId, spell1 = :spell1, spell2 = :spell2, link = :link, realId = :realId');
        $q->bindValue(':matchId', $gm->getMatchId(), PDO::PARAM_INT);
        $q->bindValue(':summonerId', $gm->getSummonerId(), PDO::PARAM_INT);
        $q->bindValue(':victory', $gm->getVictory(), PDO::PARAM_INT);
        $q->bindValue(':matchType', $gm->getMatchType());
        $q->bindValue(':matchDuration', $gm->getMatchDuration(), PDO::PARAM_INT);
        $q->bindValue(':matchCreation', $gm->getMatchCreation(), PDO::PARAM_INT);
        $q->bindValue(':championId', $gm->getChampionId(), PDO::PARAM_INT);
        $q->bindValue(':teamId', $gm->getTeamId(), PDO::PARAM_INT);
        $q->bindValue(':spell1', $gm->getSpell1(), PDO::PARAM_INT);
        $q->bindValue(':spell2', $gm->getSpell2(), PDO::PARAM_INT);
        $q->bindValue(':link', $gm->getLink());
        $q->bindValue(':realId', $gm->getRealId());

      $q->execute();
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