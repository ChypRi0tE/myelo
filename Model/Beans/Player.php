<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 18/03/2015
 * Time: 14:22
 */

class Player implements JsonSerializable {
    protected   $id;
    protected   $idTeam;
    protected   $idSummoner;
    protected   $name;
    protected   $league;
    protected   $division;
    protected   $avatar;
    protected   $current;

    public function __construct(array $data) {
        $this->initialize($data);
    }
    public function initialize(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function jsonSerialize() {
        $json = array();
            foreach($this as $key => $value) {
                $json[$key] = $value;
            }
        return $json;
    }
    public function jsonTeamPlayer() {
        $json = [];
        $json['id'] = $this->id;
        $json['name'] = $this->name;
        $json['idSummoner'] = $this->idSummoner;
        $json['idTeam'] = $this->idTeam;
        $json['rank'] = $this->getMedal();
        $json['league'] = $this->displayRank();
        $json['current'] = $this->current;
        return $json;
    }
/*
**-------------------
**--GETTERS-SETTERS--
**-------------------
*/
    public function getMedal() {
    $url = "";
    if ($this->league == "MASTER" || $this->league == "CHALLENGER")
        $url .= strtolower($this->league) . "_1";
    else if ($this->league == "UNRANKED")
        $url .= "unknown";
    else
        $url .= strtolower($this->league) ."_".$this->division."";
      return $url;
    }

    public function displayRank() {
        if ($this->league == "MASTER" || $this->league == "CHALLENGER" || $this->league == "UNRANKED")
            return ucfirst(strtolower($this->league));
        else if ($this->league == "DIAMOND")
            return "Diamant " . $this->division;
        else if ($this->league == "PLATINUM")
            return "Platine " . $this->division;
        else
            return ucfirst(strtolower($this->league)) . " " . $this->division;
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
    public function getCurrent() {
        return $this->current;
    }
    public function setCurrent($current) {
        $this->current = $current;
    }
} 