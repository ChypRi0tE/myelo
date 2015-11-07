<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 18/03/2015
 * Time: 14:22
 */

class Player {
    protected   $id;
    protected   $idTeam;
    protected   $idSummoner;
    protected   $name;
    protected   $league;
    protected   $division;
    protected   $avatar;

    public function __construct(array $data) {
        $this->abreuve($data);
        debug('Player \'' . $this->name . '\' created');
    }
    public function abreuve(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getMedal() {
      $url = "http://lkimg.zamimg.com/images/medals/";
      $url .= strtolower($this->league) ."_";
      
      return $url;
    }

    public function displayRank() {
      if ($this->league == "MASTER" || $this->league == "CHALLENGER" || $this->league == "UNRANKED")
        return $this->league;
      else
        return $this->league . " " . $this->division;
    }

    public function displayAvatar() {
      return "http://ddragon.leagueoflegends.com/cdn/5.3.1/img/profileicon/".$this->avatar.".png";
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
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getIdSummoner() {
        return $this->idSummoner;
    }
    public function setIdSummoner($idSummoner) {
        $this->idSummoner = $idSummoner;
    }
    public function getIdTeam() {
        return $this->idTeam;
    }
    public function setIdTeam($idTeam) {
        $this->idTeam = $idTeam;
    }
    public function getLeague() {
        return $this->league;
    }
    public function setLeague($league) {
        $this->league = $league;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
} 