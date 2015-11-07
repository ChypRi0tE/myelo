<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 21/02/2015
 * Time: 15:30
 */

class PostManager {
    private $_bdd;

    public function __construct($bdd) {
        $this->_bdd = $bdd;
    }

    public function delete(Post $ps) {
        $this->_bdd->exec('DELETE FROM elo_posts WHERE id = '.$ps->getId());
    }

    public function get($id) {
        $q = $this->bdd->query('SELECT * FROM elo_posts WHERE id = '.$id);
        $data = $q->fetch();
        return new Post($data);
    }

    public function add(Post $ps) {
        $q = $this->_bdd->prepare('INSERT INTO elo_posts SET title = :title, content = :content, author = :author, date = :date');
        $q->bindValue(':title', $ps->getTitle());
        $q->bindValue(':content', $ps->getContent());
        $q->bindValue(':author', $ps->getAuthor());
        $q->bindValue(':date', $ps->getDate());

        $q->execute();
        debug("Post added to the database.");
    }

    public function getLast($nb) {
        $posts = [];
        $q = $this->_bdd->query('SELECT * FROM elo_posts ORDER BY date DESC, ID DESC LIMIT '.$nb);
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getAll() {
        $posts = [];
        $q = $this->_bdd->query('SELECT * FROM elo_posts ORDER BY date DESC, ID DESC');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }
        return $posts;
    }
};