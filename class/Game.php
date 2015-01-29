<?php
  class Game {
    private $_id;
    private $_idA;
    private $_idB;
    private $_ratingA;
    private $_ratingB;
    private $_result;
    private $_date;
    private $_newA;
    private $_newB;

    public function __construct(array $data) {
      $this->abreuve($data);
      debug("Game $this->_id created.");
    }

    public function getId() {
      return $this->_id;
    }
    public function setId($id) {
      $this->_id = $id;
    }
    
    public function getIda() {
      return $this->_idA;
    }
    public function setIda($id) {
      $this->_idA = $id;
    }
    
    public function getIdb() {
      return $this->_idB;
    }
    public function setIdb($id) {
      $this->_idB = $id;
    }
    
    public function getRatinga() {
      return $this->_ratingA;
    }
    public function setRatinga($rate) {
      $this->_ratingA = $rate;
    }
    
    public function getRatingb() {
      return $this->_ratingB;
    }
    public function setRatingb($rate) {
      $this->_ratingB = $rate;
    }
    
    public function getResult() {
      return $this->_result;
    }
    public function setResult($res) {
      $this->_result = $res;
    }
    
    public function getDate() {
      return $this->_date;
    }
    public function setDate($date) {
      $this->_date = $date;
    }
    
    public function getNewa() {
      return $this->_newA;
    }
    public function setNewa($rate) {
      $this->_newA = $rate;
    }
    
    public function getNewb() {
      return $this->_newB;
    }
    public function setNewb($rate) {
      $this->_newB = $rate;
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
      echo "Dumping Game " . $this->_id . ": <br />";
      echo "Team A: id=" . $this->_idA . " rating=" . $this->_ratingA . " new=" . $this->_newA . "<br />";
      echo "Team B: id=" . $this->_idB . " rating=" . $this->_ratingB . " new=" . $this->_newB . "<br />";
      echo "Date: " . $this->_date . " - Resultat: " . $this->_result . "<br />";
    }
  }
?>