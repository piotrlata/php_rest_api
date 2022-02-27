<?php

namespace app\controllers;

use app\config\Router;
use app\models\Category;

class CategoryController
{
    public function index(Router $router)
    {
        $search = $_GET['search'] ?? '';
        $categories = $router->db->getCategories($search);
        $router->renderView("categories/index", [
            'categories' => $categories,
            'search' => $search
        ]);
    }

    public function create(Router $router)
    {
        $errors = [];
        $categoryData = [
            'name' => ""
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryData['name'] = $_POST['name'];

            $category = new Category();
            $category->load($categoryData);
            $errors = $category->save();
            header("Location: /categories");
            exit;
        }
        $router->renderView("/categories/create", [
            'category' => $categoryData,
            'errors' => $errors
        ]);
    }

    public function delete(Router $router)
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            header("Location: /categories");
            exit;
        }
        if ($router->db->deleteCategory($id)) {
            header("Location: /categories");
            exit;
        }
    }

    public function view(Router $router)
    {
        $search = $_GET['search'] ?? '';
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /categories");
        }
        $videos = $router->db->getVideos($search, $id);
        $router->renderView("videos/index", [
            'videos' => $videos,
            'search' => $search,
            'id' => $id
        ]);
    }
}