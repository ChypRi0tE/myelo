<?php
class Summoner {
    private $_id;
    private $_name;
    private $_profileIcon;
    private $_teamId;
    
    public function __construct($id) {
      global $api;
      $sum = $api->getSummoner($id);
      $this->_id = $id;
      $this->_name = $sum['name'];
      $this->_profileIcon = $sum['profileIconId'];
      $this->_teamId = 0;
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
    
    public function getProfileIcon() {
        return $this->_profileIcon;
    }
    public function setProfileIcon($profileIcon) {
        $this->_profileIcon = $profileIcon;
    }

    public function getTeamId() {
      return $this->_teamId;
    }
    public function setTeamId($teamId) {
      $this->_teamId = $teamId;
    }
}
?>