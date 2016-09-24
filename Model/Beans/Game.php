<?php
  class Game implements JsonSerializable {
    protected $id;
    protected $idA;
    protected $idB;
    protected $ratingA;
    protected $ratingB;
    protected $result;
    protected $date;
    protected $newA;
    protected $newB;

    public function __construct(array $data) {
      $this->abreuve($data);
    }
    public function abreuve(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function jsonSerialize() {
        global $bdd;
        $json = array();
            foreach($this as $key => $value) {
                $json[$key] = $value;
            }
        $json['date'] = date("d/m/y", strtotime($json['date']));
        $TeamManager = new TeamManager($bdd);
        $json['nameA'] = $TeamManager->get($json['idA'])->getName();
        $json['nameB'] = $TeamManager->get($json['idB'])->getName();
        return $json;
    }
    public function jsonTeamGame($tid) {
        global $TeamManager;
        $json = [];
        $json['id'] = $this->id;
        $json['adversaire'] = $TeamManager->get(($this->idA != $tid) ? $this->idA : $this->idB)->getName();
        $json['teamRating'] = ($this->idA == $tid) ? $this->ratingA : $this->ratingB;
        $json['advRating'] = ($this->idA != $tid) ? $this->ratingA : $this->ratingB;
        $json['victory'] = ($this->result == $tid) ? "true" : "false";
        $json['date'] = date("d/m/Y", strtotime($this->date));
        $json['evolution'] = sprintf("%+d",($this->idA == $tid) ? ($this->newA - $this->ratingA) : $this->newB - $this->ratingB);
        return $json;
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

    public function getIda() {
      return $this->idA;
    }
    public function setIda($id) {
      $this->idA = $id;
    }

    public function getIdb() {
      return $this->idB;
    }
    public function setIdb($id) {
      $this->idB = $id;
    }

    public function getRatinga() {
      return $this->ratingA;
    }
    public function setRatinga($rate) {
      $this->ratingA = $rate;
    }

    public function getRatingb() {
      return $this->ratingB;
    }
    public function setRatingb($rate) {
      $this->ratingB = $rate;
    }

    public function getResult() {
      return $this->result;
    }
    public function setResult($res) {
      $this->result = $res;
    }

    public function getDate() {
      return $this->date;
    }
    public function setDate($date) {
      $this->date = $date;
    }

    public function getNewa() {
      return $this->newA;
    }
    public function setNewa($rate) {
      $this->newA = $rate;
    }

    public function getNewb() {
      return $this->newB;
    }
    public function setNewb($rate) {
      $this->newB = $rate;
    }
  };
