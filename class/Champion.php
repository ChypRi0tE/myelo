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
        $this->_pic = "http://ddragon.leagueoflegends.com/cdn/5.1.2/img/champion/" . $champ['name'] . ".png";
        $this->_title = $champ['title'];
        if ($this->_name == "Jarvan IV")
            $this->_pic = "http://ddragon.leagueoflegends.com/cdn/5.1.2/img/champion/JarvanIV.png";
        else if ($this->_name == "LeBlanc")
            $this->_pic = "http://ddragon.leagueoflegends.com/cdn/5.1.2/img/champion/Leblanc.png";
        else if ($this->_name == "Rek'Sai")
            $this->_pic = "http://ddragon.leagueoflegends.com/cdn/5.1.2/img/champion/RekSai.png";
        debug("Champion " . $this->_name . "(" .$this->_id . ") created");
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