<?php



class GameManager {

    private $_bdd;



    public function __construct($bdd) {

      $this->_bdd = $bdd;

    }



    public function delete(Game $gm) {

      $this->_bdd->exec('DELETE FROM elo_games WHERE id = '.$gm->getId());

    }



    public function get($id) {

      $q = $this->_bdd->query('SELECT * FROM elo_games WHERE id = '.$id);

      $data = $q->fetch();

      return new Game($data);

    }



    public function add(Game $gm) {

      $q = $this->_bdd->prepare('INSERT INTO elo_games SET idA = :idA, idB = :idB, ratingA = :ratingA, ratingB = :ratingB, result = :result, date = :date, newA = :newA, newB = :newB');

      $q->bindValue(':idA', $gm->getIda(), PDO::PARAM_INT);

      $q->bindValue(':idB', $gm->getIdb(), PDO::PARAM_INT);

      $q->bindValue(':ratingA', $gm->getRatinga(), PDO::PARAM_INT);

      $q->bindValue(':ratingB', $gm->getRatingb(), PDO::PARAM_INT);

      $q->bindValue(':result', $gm->getResult(), PDO::PARAM_INT);

      $q->bindValue(':date', $gm->getDate());

      $q->bindValue(':newA', $gm->getNewa(), PDO::PARAM_INT);

      $q->bindValue(':newB', $gm->getNewb(), PDO::PARAM_INT);



      $q->execute();

    }



    public function update(Game $gm) {

      $q = $this->_bdd->prepare('UPDATE elo_games SET idA = :idA, idB = :idB, ratingA = :ratingA, ratingB = :ratingB, result = :result, date = :date, newA = :newA, newB = :newB WHERE id = :id');

      $q->bindValue(':idA', $gm->getIda(), PDO::PARAM_INT);

      $q->bindValue(':idB', $gm->getIdb(), PDO::PARAM_INT);

      $q->bindValue(':ratingA', $gm->getRatinga(), PDO::PARAM_INT);

      $q->bindValue(':ratingB', $gm->getRatingb(), PDO::PARAM_INT);

      $q->bindValue(':result', $gm->getResult(), PDO::PARAM_INT);

      $q->bindValue(':date', $gm->getDate());

      $q->bindValue(':newA', $gm->getNewa(), PDO::PARAM_INT);

      $q->bindValue(':newB', $gm->getNewb(), PDO::PARAM_INT);

      $q->bindValue(':id', $gm->getId(), PDO::PARAM_INT);



      $q->execute();

    }



    public function getLast($nb) {

        $games = [];

        $q = $this->_bdd->query('SELECT * FROM elo_games ORDER BY date DESC, ID DESC LIMIT '.$nb);

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {

            $games[] = new Game($data);

        }

        return $games;

    }



    public function getAll() {

      $games = [];

      $q = $this->_bdd->query('SELECT * FROM elo_games ORDER BY date DESC, ID DESC');

      while ($data = $q->fetch(PDO::FETCH_ASSOC)) {

        $games[] = new Game($data);

      }

      return $games;

    }



    public function getForTeam($id) {

      $games = [];

      $q = $this->_bdd->query('SELECT * FROM elo_games WHERE idA= '.$id.' OR idB = '.$id.' ORDER BY date DESC, ID DESC');

      while ($data = $q->fetch(PDO::FETCH_ASSOC)) {

          $games[] = new Game($data);

      }

      return $games;

    }

};
