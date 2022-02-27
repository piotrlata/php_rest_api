<?php

namespace app\controllers;

use app\config\Router;
use app\models\Video;

class VideoController
{
//    public function index(Router $router)
//    {
//        $search = $_GET['search'] ?? '';
//        $id = $_GET['id'] ?? null;
//        if (!$id) {
//            header("Location: /categories");
//        }
//        $videos = $router->db->getVideos($search, $id);
//        $router->renderView("videos/index", [
//            'videos' => $videos,
//            'search' => $search,
//            'id' => $id
//        ]);
//    }+

    public function create(Router $router)
    {
        $errors = [];
        $id = $_GET['id'];
        $videoData = [
            'title' => "",
            'video_url' => "",
            'category_id' => ""
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $videoData['title'] = $_POST['title'];
            $videoData['video_url'] = $_POST['video_url'] ?? null;
            $videoData['category_id'] = $_POST['category_id'] ?? null;

            $video = new Video();
            $video->load($videoData);
            $errors = $video->save();
            header("Location: /categories/videos?id=$id");
            exit;
        }
        $router->renderView("/videos/create", [
            'video' => $videoData,
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
        if ($router->db->deleteVideo($id)) {
            header("Location: /categories");
            exit;
        }
    }

    public function view(Router $router)
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /videos");
            exit;
        }
        $videoData = $router->db->getVideoById($id);
        $router->renderView("videos/view", [
            'video' => $videoData
        ]);
    }
}