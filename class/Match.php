<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 21/01/2015
 * Time: 22:59
 */

class Match {
    private $_matchId;
    private $_summonerId;
    private $_matchType;
    private $_matchDuration;
    private $_matchCreation;
    private $_victory;
    private $_championId;
    private $_teamId;
    private $_spell1;
    private $_spell2;
    private $_link;
    private $_realid;

    public function __construct($data) {
      $this->abreuve($data);
      debug("Match $this->_matchId created.");
    }

    public function getChampionId() {
        return $this->_championId;
    }
    public function setChampionId($championId) {
        $this->_championId = $championId;
    }

    public function getMatchType() {
        return $this->_matchType;
    }
    public function setMatchType($matchType) {
        $this->_matchType = $matchType;
    }

    public function getMatchCreation() {
        return $this->_matchCreation;
    }
    public function setMatchCreation($matchCreation) {
        $this->_matchCreation = $matchCreation;
    }

    public function getMatchDuration() {
        return $this->_matchDuration;
    }
    public function setMatchDuration($matchDuration) {
        $this->_matchDuration = $matchDuration;
    }

    public function getMatchId() {
        return $this->_matchId;
    }
    public function setMatchId($matchId) {
        $this->_matchId = $matchId;
    }

    public function getSpell1() {
        return $this->_spell1;
    }
    public function setSpell1($spell1) {
        $this->_spell1 = $spell1;
    }

    public function getSpell2() {
        return $this->_spell2;
    }
    public function setSpell2($spell2) {
        $this->_spell2 = $spell2;
    }

    public function getSummonerId() {
        return $this->_summonerId;
    }
    public function setSummonerId($summonerId) {
        $this->_summonerId = $summonerId;
    }

    public function getTeamId() {
        return $this->_teamId;
    }
    public function setTeamId($teamId) {
        $this->_teamId = $teamId;
    }

    public function getLink() {
        return $this->_link;
    }
    public function setLink($link) {
        $this->_link = $link;
    }

    public function getVictory() {
        return $this->_victory;
    }
    public function setVictory($victory) {
        $this->_victory = $victory;
    }

    public function getRealId() {
        return $this->_realid;
    }
    public function setRealId($realid) {
        $this->_realid = $realid;
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
      echo "Dumping Match " . $this->_matchId . " from summoner " . $this->_summonerId . "<br />";
      echo "Type: " . $this->_matchType . " Creation: " . $this->_matchCreation . " Duration=" . $this->_matchDuration . "<br />";
      echo "Champion: id=" . $this->_championId . " Team=" . $this->_teamId . "<br />";
      echo "Summoners: " . $this->_spell1 . " et " . $this->_spell2;
    }
}
?>