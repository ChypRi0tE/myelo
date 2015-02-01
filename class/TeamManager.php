<?php
    class TeamManager {
    private $_bdd;

    public function __construct($bdd) {
      $this->_bdd = $bdd;
    }

    public function add(Team $tm)
    {
      $q = $this->_bdd->prepare('INSERT INTO elo_teams SET name = :name, played = :played, rating = :rating, oldrating = :oldrating, wins = :wins, losses = :losses');
      $q->bindValue(':name', $tm->getName());
      $q->bindValue(':played', $tm->getPlayed(), PDO::PARAM_INT);
      $q->bindValue(':rating', $tm->getRating(), PDO::PARAM_INT);
      $q->bindValue(':oldrating', $tm->getOldRating(), PDO::PARAM_INT);
      $q->bindValue(':wins', $tm->getWins(), PDO::PARAM_INT);
      $q->bindValue(':losses', $tm->getLosses(), PDO::PARAM_INT);

      $q->execute();
      debug("Team '" . $tm->getName() . "' added to the database.");
    }

    public function delete(Team $tm)
    {
      $this->_bdd->exec('DELETE FROM elo_teams WHERE id = ' . $tm->getId());
    }

    public function get($id)
    {
      $q = $this->_bdd->query('SELECT * FROM elo_teams WHERE id = ' . $id);
      $data = $q->fetch();
      return new Team($data);
    }

    public function getAll()
    {
      $teams = [];
      $q = $this->_bdd->query('SELECT * FROM elo_teams ORDER BY ID DESC');
      while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
        $teams[] = new Team($data);
      }
      return $teams;
    }

    public function getAllByRating()
    {
        $teams = [];
        $q = $this->_bdd->query('SELECT * FROM elo_teams ORDER BY rating DESC');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $teams[] = new Team($data);
        }
        return $teams;
    }

    public function getAllByName()
    {
        $teams = [];
        $q = $this->_bdd->query('SELECT * FROM elo_teams ORDER BY name ASC');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $teams[] = new Team($data);
        }
        return $teams;
    }

    public function getLast($nb) {
      $teams = [];
      $q = $this->_bdd->query('SELECT * FROM elo_teams ORDER BY ID DESC LIMIT '.$nb);
      while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
        $teams[] = new Team($data);
      }
      return $teams;
    }

    public function update(Team $tm)
    {
      $q = $this->_bdd->prepare('UPDATE elo_teams SET name = :name, played = :played, rating = :rating, oldrating = :oldrating, wins = :wins, losses = :losses WHERE id = :id');

      $q->bindValue(':name', $tm->getName());
      $q->bindValue(':played', $tm->getPlayed(), PDO::PARAM_INT);
      $q->bindValue(':rating', $tm->getRating(), PDO::PARAM_INT);
      $q->bindValue(':oldrating', $tm->getOldRating(), PDO::PARAM_INT);
      $q->bindValue(':wins', $tm->getWins(), PDO::PARAM_INT);
      $q->bindValue(':losses', $tm->getLosses(), PDO::PARAM_INT);
      $q->bindValue(':id', $tm->getId(), PDO::PARAM_INT);

      $q->execute();
    }

    public function updateGame(Game $gm)
    {
      // Updating team a
      $a = TeamManager::get($gm->getIda());
      $a->setPlayed($a->getPlayed() + 1);
      $a->setOldrating($a->getRating());
      $a->setRating($gm->getNewa());
      if ($gm->getResult() == 1) {
        $a->setWins($a->getWins() + 1);
        $a->setLosses($a->getLosses());
      } else {
        $a->setWins($a->getWins());
        $a->setLosses($a->getLosses() + 1);
      }
      TeamManager::update($a);

      // Updating team b
      $b = TeamManager::get($gm->getIdb());
      $b->setPlayed($b->getPlayed() + 1);
      $b->setOldrating($b->getRating());
      $b->setRating($gm->getNewb());
      if ($gm->getResult() == 2) {
        $b->setWins($b->getWins() + 1);
        $b->setLosses($b->getLosses());
      } else {
        $b->setWins($b->getWins());
        $b->setLosses($b->getLosses() + 1);
      }
      TeamManager::update($b);
    }
  };
?>