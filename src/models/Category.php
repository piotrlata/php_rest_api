<?php

namespace app\models;

use app\config\Database;

class Category
{
    public ?int $id = null;
    public string $name;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
    }
    public function save()
    {
        $errors = [];
        if (!$this->name) {
            $errors[] = "Category name required";
        }
        if (empty($errors)) {
            $db = Database::$db;
            $db->createCategory($this);
        }
        return $errors;
    }
}