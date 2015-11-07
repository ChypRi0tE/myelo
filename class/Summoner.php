<?php
class Summoner {
    private $_id;
    private $_name;
    private $_avatar;
    private $_division;
    private $_league;
    
    public function __construct($id) {
      global $api;
      $sum = $api->getSummoner($id);
      $this->_id = $id;
      $this->_name = $sum['name'];
      $this->_avatar = $sum['profileIconId'];
      $rank = $api->getLeague($id, 'entry')[$id];
      for ($i = 0; !empty($rank[$i]); $i++) {
        if ($rank[$i]['queue'] == "RANKED_SOLO_5x5") {
          $this->_league = $rank[$i]['tier'];
          $this->_division = $this->div($rank[$i]['entries'][0]['division']);
        }
      }
      if (empty($this->_league)) {
        $this->_league = "UNRANKED";
      }
    }

    public function getName() {
        return $this->_name;
    }
    public function setName($name) {
        $this->_name = $name;
    }
    
    public function getId() {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function getAvatar() {
        return $this->_avatar;
    }
    public function setAvatar($avatar) {
        $this->_avatar = $avatar;
    }
    
    public function getDivision() {
        return $this->_division;
    }
    public function setDivision($division) {
        $this->_division = $division;
    }
    
    public function getLeague() {
        return $this->_league;
    }
    public function setLeague($league) {
        $this->_league = $$league;
    }
    
    private function div($div) {
      switch ($div) {
        case "I":
          return 1;
        case "II":
          return 2;
        case "III":
          return 3;
        case "IV":
          return 4;
        case "V":
          return 5;
        default:
          return 0;
      }
    }
}