<?php



class PlayerManager {

    private $_bdd;



    public function __construct($bdd) {

        $this->_bdd = $bdd;

    }



    public function add(Player $pl) {

        $q = $this->_bdd->prepare('INSERT INTO elo_teams_players SET idTeam = :idTeam, idSummoner = :idSummoner, name = :name, league = :league, division = :division, avatar = :avatar, current = 1');

        $q->bindValue(':idTeam', $pl->getIdTeam(), PDO::PARAM_INT);

        $q->bindValue(':idSummoner', $pl->getIdSummoner(), PDO::PARAM_INT);

        $q->bindValue(':name', $pl->getName());

        $q->bindValue(':league', $pl->getLeague(), PDO::PARAM_INT);

        $q->bindValue(':division', $pl->getDivision(), PDO::PARAM_INT);

        $q->bindValue(':avatar', $pl->getAvatar(), PDO::PARAM_INT);

        $q->execute();

    }



    public function delete(Player $pl) {

        $this->_bdd->exec('DELETE FROM elo_teams_players WHERE id = ' . $pl->getId());

    }



    public function get($id) {

        $q = $this->_bdd->query('SELECT * FROM elo_teams_players WHERE id = ' . $id);

        $data = $q->fetch();

        return new Player($data);

    }



    public function getAll() {

        $players = [];

        $q = $this->_bdd->query('SELECT * FROM elo_teams_players ORDER BY league ASC, division ASC');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {

            $players[] = new Player($data);

        }

        return $players;

    }



    public function getForTeam($id) {

        $players = [];

        $q = $this->_bdd->query('SELECT * FROM elo_teams_players WHERE idTeam = '.$id);

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {

            $players[] = new Player($data);

        }

        return $players;

    }



    public function getLast($nb) {

        $players = [];

        $q = $this->_bdd->query('SELECT * FROM elo_teams_players ORDER BY id DESC LIMIT '.$nb);

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {

            $players[] = new Player($data);

        }

        return $players;

    }

};
