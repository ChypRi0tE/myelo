<?php

  class Team {
    private $_id;
    private $_name;
    private $_played;
    private $_rating;
    private $_oldrating;
    private $_wins;
    private $_losses;
    private $_active;
    private $_logo;
    
    public function __construct(array $data) {
      $this->_played = 0;
      $this->_wins = 0;
      $this->_losses = 0;
      $this->_active = 1;
	  	$this->abreuve($data);
      $this->_oldrating = $this->_rating;
		  debug('Team \'' . $this->_name . '\' created with rating ' . $this->_rating);
    }
    
    public function getId() {
      return $this->_id;
    }
    public function setId($id) {
      $this->_id = $id;
    }
    
    public function getName() {
      return $this->_name;
    }
    public function setName($name) {
      $this->_name = $name;
    }
    
    public function getPlayed() {
      return $this->_played;
    }
    public function setPlayed($played) {
      $this->_played = $played;
    }
    
    public function getRating() {
      return $this->_rating;
    }
    public function setRating($rating) {
      $this->_rating = $rating;
    }
    
    public function getOldrating() {
      return $this->_oldrating;
    }
    public function setOldrating($oldrating) {
      $this->_oldrating = $oldrating;
    }
    
    public function getWins() {
      return $this->_wins;
    }
    public function setWins($wins) {
      $this->_wins = $wins;
    }
    
    public function getLosses() {
      return $this->_losses;
    }
    public function setLosses($losses) {
      $this->_losses = $losses;
    }

      public function getActive() {
          return $this->_active;
      }
      public function setActive($active) {
          $this->_active = $active;
      }

      public function getLogo() {
          return $this->_logo;
      }
      public function setLogo($logo) {
          $this->_logo = $logo;
      }
    
    public function abreuve(array $data) {
      foreach ($data as $key => $value) {
        $method = 'set'.ucfirst($key);
        if (method_exists($this, $method)) {
          $this->$method($value);
        }
      }
    }
    
    public function dump() {
      echo "Dumping Team " . $this->_name . "<br />";
      echo "Rating: " . $this->_rating . " (Old rating: " . $this->_oldrating . ")<br />";
      echo $this->_played . " games played (". $this->_wins . " wins and " . $this->_losses . " losses)";
    }
  }
?>