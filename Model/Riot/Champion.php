<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 21/03/2015
 * Time: 01:59
 */

class Champion implements JsonSerializable {
    protected $id;
    protected $name;
    protected $pic;
    protected $title;

    public function jsonSerialize() {
        $json = array();
        foreach($this as $key => $value) {
            $json[$key] = $value;
        }
        return $json;
    }
    public function __construct($id) {
        global $api;
        $champ = $api->getStatic('champion', $id);
        $this->id = $id;
        $this->name = $champ['name'];
        $this->pic = "http://ddragon.leagueoflegends.com/cdn/5.2.1/img/champion/" . $champ['name'] . ".png";
        $this->title = $champ['title'];
        if ($this->name == "Jarvan IV")
            $this->pic = "http://ddragon.leagueoflegends.com/cdn/5.2.1/img/champion/JarvanIV.png";
        else if ($this->name == "LeBlanc")
            $this->pic = "http://ddragon.leagueoflegends.com/cdn/5.2.1/img/champion/Leblanc.png";
        else if ($this->name == "Master Yi")
            $this->pic = "http://ddragon.leagueoflegends.com/cdn/5.2.1/img/champion/MasterYi.png";
        else if ($this->name == "Lee Sin")
            $this->pic = "http://ddragon.leagueoflegends.com/cdn/5.2.1/img/champion/LeeSin.png";
        else if ($this->name == "Fiddlesticks")
            $this->pic = "http://ddragon.leagueoflegends.com/cdn/5.2.1/img/champion/FiddleSticks.png";
        else if ($this->name == "Rek'Sai")
            $this->pic = "http://ddragon.leagueoflegends.com/cdn/5.2.1/img/champion/RekSai.png";
        else if ($this->name == "Xin Zhao")
            $this->pic = "http://ddragon.leagueoflegends.com/cdn/5.2.1/img/champion/XinZhao.png";
        else if ($this->name == "Cho'Gath")
            $this->pic = "http://ddragon.leagueoflegends.com/cdn/5.2.1/img/champion/Chogath.png";
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
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
    public function getPic() {
        return $this->pic;
    }
    public function setPic($pic) {
        $this->pic = $pic;
    }
} 