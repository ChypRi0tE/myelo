<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 21/02/2015
 * Time: 15:25
 */

class Post {
    private $_id;
    private $_title;
    private $_author;
    private $_content;
    private $_date;

    public function __construct(array $data) {
        $this->abreuve($data);
        debug("Post $this->_id created.");
    }


    public function getAuthor() {
        return $this->_author;
    }
    public function setAuthor($author) {
        $this->_author = $author;
    }
    public function getContent() {
        return $this->_content;
    }
    public function setContent($content) {
        $this->_content = $content;
    }
    public function getDate() {
        return $this->_date;
    }
    public function setDate($date) {
        $this->_date = $date;
    }
    public function getId() {
        return $this->_id;
    }
    public function setId($id) {
        $this->_id = $id;
    }
    public function getTitle() {
        return $this->_title;
    }
    public function setTitle($title) {
        $this->_title = $title;
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
        echo "Dumping Post " . $this->_id . ": <br />";
        echo "Title: " . $this->_title . " Author:" . $this->_author . " date:" . $this->_date . "<br />";
        echo "Content: " . $this->_content . "<br />";
    }
} 