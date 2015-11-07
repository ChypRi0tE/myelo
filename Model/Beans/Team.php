<?php

  class Team implements JsonSerializable {
    protected $id;
    protected $name;
    protected $played;
    protected $rating;
    protected $oldrating;
    protected $wins;
    protected $losses;
    protected $active;
    protected $logo;
    protected $players;
    protected $games;
    
    public function __construct(array $data) {
        $this->played = 0;
        $this->oldrating = $data['rating'];
        $this->wins = 0;
        $this->losses = 0;
        $this->logo = "";
        $this->active = 1;
        $this->players = [];
        $this->games = [];
	    $this->initialize($data);
    }
    
    public function initialize(array $data) {
      foreach ($data as $key => $value) {
        $method = 'set'.ucfirst($key);
        if (method_exists($this, $method)) $this->$method($value);
      }
    }
    public function jsonSerialize() {
        $json = array();
        foreach($this as $key => $value) {
            $json[$key] = $value;
        }
        $json['players'] = [];
        foreach ($this->players as $pl) {
            $json['players'][] = $pl->jsonTeamPlayer();
        }
        $json['games'] = [];
        foreach ($this->games as $gm) {
            $json['games'][] = $gm->jsonTeamGame($this->id);
        }
        return $json;
    }
    
    
    public function addPlayer(Player $player) {
        $this->players[] = $player;
    }
/*
**-------------------
**--GETTERS-SETTERS--
**-------------------
*/
    public function getId() {
      return $this->id;
    }
    public function setId($id) {
      $this->id = $id;
    }
    public function getName() {
      return $this->name;
    }
    public function setName($name) {
      $this->name = $name;
    }
    public function getPlayed() {
      return $this->played;
    }
    public function setPlayed($played) {
      $this->played = $played;
    }
    public function getRating() {
      return $this->rating;
    }
    public function setRating($rating) {
      $this->rating = $rating;
    }
    public function getOldrating() {
      return $this->oldrating;
    }
    public function setOldrating($oldrating) {
      $this->oldrating = $oldrating;
    }
    public function getWins() {
      return $this->wins;
    }
    public function setWins($wins) {
      $this->wins = $wins;
    }
    public function getLosses() {
      return $this->losses;
    }
    public function setLosses($losses) {
      $this->losses = $losses;
    }
    public function getActive() {
      return $this->active;
    }
    public function setActive($active) {
      $this->active = $active;
    }
    public function getLogo() {
      return $this->logo;
    }
    public function setLogo($logo) {
      $this->logo = $logo;
    }
    public function getPlayers() {
      return $this->players;
    }
    public function setPlayers($players) {
      $this->players = $players;
    }
    public function getGames() {
      return $this->games;
    }
    public function setGames($games) {
      $this->games = $games;
    }
  }
?>