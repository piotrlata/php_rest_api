<?php

namespace app\config;

use app\models\Category;
use app\models\Video;
use PDO;

class Database
{
    private PDO $pdo;
    public static Database $db;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=test", 'root', 'root');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        self::$db = $this;
    }

    public function getVideos($search = '', $id)
    {
        if ($search) {
            $statement = $this->pdo->prepare("SELECT * FROM test.videos WHERE category_id = :id AND title LIKE :keyword ORDER BY added_date DESC");
            $statement->bindValue(":keyword", "%$search%");
            $statement->bindValue(":id", $id);
        } else {
            $statement = $this->pdo->prepare("SELECT * FROM test.videos WHERE category_id = :id ORDER BY added_date DESC");
            $statement->bindValue(":id", $id);
        }
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createVideo(Video $video)
    {
        $statement = $this->pdo->prepare("INSERT INTO test.videos (title, video_url, category_id, added_date)
                                    VALUES (:title, :video_url, :category_id, :added_date)");
        $statement->bindValue(':title', $video->title);
        $statement->bindValue(':video_url', $video->video_url);
        $statement->bindValue(':category_id', $video->category_id);
        $statement->bindValue(':added_date', date("Y-m-d H:i:s"));

        $statement->execute();
    }

    public function deleteVideo($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM test.videos WHERE id = :id");
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    public function getVideoById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM test.videos WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategories($search = '')
    {
        if ($search) {
            $statement = $this->pdo->prepare("SELECT * FROM test.categories WHERE name LIKE :keyword ORDER BY added_date DESC");
            $statement->bindValue(":keyword", "%$search%");
        } else {
            $statement = $this->pdo->prepare("SELECT * FROM test.categories ORDER BY added_date DESC");
        }
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCategory(Category $category)
    {
        $statement = $this->pdo->prepare("INSERT INTO test.categories (name, added_date)
                                    VALUES (:title, :added_date)");
        $statement->bindValue(':title', $category->name);
        $statement->bindValue(':added_date', date("Y-m-d H:i:s"));

        $statement->execute();
    }

    public function deleteCategory($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM test.categories WHERE id = :id");
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    public function getCategoryById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM test.categories WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}