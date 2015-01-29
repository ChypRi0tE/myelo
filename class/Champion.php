<?php
class Champion {
    private $_id;
    private $_name;
    private $_pic;
    private $_title;

    public function __construct($id) {
        global $api;
        $champ = $api->getStatic('champion', $id);
        $this->_id = $id;
        $this->_name = $champ['name'];
        $this->_pic = "http://ddragon.leagueoflegends.com/cdn/3.15.5/img/champion/" . $champ['name'] . ".png";
        $this->_title = $champ['title'];
    }

    public function getTitle() {
        return $this->_title;
    }
    public function setTitle($title) {
        $this->_title = $title;
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

    public function getPic() {
        return $this->_pic;
    }
    public function setPic($pic) {
        $this->_pic = $pic;
    }
}
?>