<?php

class Post
{
    private $conn;
    private $table = 'posts';

    public $id;
    public $title;
    public $content;
    public $media;
    public $created_at;
    public $user_id;
    public $category;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' (title, content, media, user_id, category) VALUES (:title, :content, :media, :user_id, :category)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':media', $this->media);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':category', $this->category);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET title = :title, content = :content, media = :media, category = :category WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':media', $this->media);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getPosts()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPostById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
