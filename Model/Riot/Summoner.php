<?php
class Summoner implements JsonSerializable {
    protected $id;
    protected $name;
    protected $avatar;
    protected $division;
    protected $league;

    public function jsonSerialize() {
        $json = array();
        foreach($this as $key => $value) {
            $json[$key] = $value;
        }
        return $json;
    }
    
    public function __construct($id) {
        global $api;
        $sum = $api->getSummoner($id);
        $this->id = $id;
        $this->name = $sum['name'];
        $this->avatar = $sum['profileIconId'];
        $rank = $api->getLeague($id, 'entry')[$id];
        for ($i = 0; !empty($rank[$i]); $i++) {
            if ($rank[$i]['queue'] == "RANKED_SOLO_5x5") {
                $this->league = $rank[$i]['tier'];
                $this->division = $this->div($rank[$i]['entries'][0]['division']);
            }
        }
        if (empty($this->league)) {
            $this->league = "UNRANKED";
        }
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getAvatar() {
        return $this->avatar;
    }
    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }
    public function getDivision() {
        return $this->division;
    }
    public function setDivision($division) {
        $this->division = $division;
    }
    public function getLeague() {
        return $this->league;
    }
    public function setLeague($league) {
        $this->league = $$league;
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