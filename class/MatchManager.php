<?php
  class MatchManager {
    private $_bdd;

    public function __construct($bdd) {
      $this->_bdd = $bdd;
    }

    public function delete(Match $gm) {
      $this->_bdd->exec('DELETE FROM lol_matches WHERE matchId = '.$gm->getMatchId());
    }
    
    public function get($id) {
      $q = $this->bdd->query('SELECT * FROM lol_matches WHERE matchId = '.$id);
      $data = $q->fetch();
      return new Match($data);
    }

    public function add(Match $gm) {
      $q = $this->_bdd->prepare('INSERT INTO lol_matches SET matchId = :matchId, matchDuration = :matchDuration, matchCreation = :matchCreation, championId = :championId, teamId = :teamId, spell1 = :spell1, spell2 = :spell2');
      $q->bindValue(':matchId', $gm->getMatchId(), PDO::PARAM_INT);
      $q->bindValue(':matchDuration', $gm->getMatchDuration(), PDO::PARAM_INT);
      $q->bindValue(':matchCreation', $gm->getMatchCreation(), PDO::PARAM_INT);
      $q->bindValue(':championId', $gm->getChampionId(), PDO::PARAM_INT);
      $q->bindValue(':teamId', $gm->getTeamId(), PDO::PARAM_INT);
      $q->bindValue(':spell1', $gm->getSpell1(), PDO::PARAM_INT);
      $q->bindValue(':spell2', $gm->getSpell2(), PDO::PARAM_INT);

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