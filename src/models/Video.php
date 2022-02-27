<?php

namespace app\models;

use app\config\Database;

class Video
{
    public ?int $id = null;
    public string $title;
    public string $video_url;
    public int $category_id;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'];
        $this->video_url = $data['video_url'];
        $this->category_id = $data['category_id'];
    }

    public function save()
    {
        $errors = [];
        if (!$this->title) {
            $errors[] = "Video title required";
        }
        if (!$this->video_url) {
            $errors[] = "Video url required";
        }
        if (!$this->category_id) {
            $errors[] = "Category required";
        }
        if (empty($errors)) {
            $db = Database::$db;
            $db->createVideo($this);
        }
        return $errors;
    }
}