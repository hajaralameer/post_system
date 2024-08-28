<?php

class PostController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        $postModel = $this->model('Post');
        $posts = $postModel->getPosts();
        $this->view('post/index', ['posts' => $posts]);
    }

    public function create()
    {
        Auth::requireLogin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postModel = $this->model('Post');
            $postModel->title = $_POST['title'];
            $postModel->content = $_POST['content'];
            $postModel->user_id = $_SESSION['user_id'];
            $postModel->category = $_POST['category'];
            $postModel->media = $this->uploadMedia();

            if ($postModel->create()) {
                header('Location: /post/index');
            } else {
                $this->view('post/create', ['error' => 'Failed to create post.']);
            }
        } else {
            $this->view('post/create');
        }
    }

    public function edit($id)
    {
        Auth::requireLogin();
        $postModel = $this->model('Post');
        $post = $postModel->getPostById($id);

        if ($post->user_id != $_SESSION['user_id']) {
            header('Location: /post/index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postModel->title = $_POST['title'];
            $postModel->content = $_POST['content'];
            $postModel->category = $_POST['category'];
            if ($_FILES['media']['name']) {
                $postModel->media = $this->uploadMedia();
            } else {
                $postModel->media = $post->media;
            }

            $postModel->id = $id;

            if ($postModel->update()) {
                header('Location: /post/index');
            } else {
                $this->view('post/edit', ['post' => $post, 'error' => 'Failed to update post.']);
            }
        } else {
            $this->view('post/edit', ['post' => $post]);
        }
    }

    public function delete($id)
    {
        Auth::requireLogin();
        $postModel = $this->model('Post');
        $post = $postModel->getPostById($id);

        if ($post->user_id != $_SESSION['user_id']) {
            header('Location: /post/index');
            exit;
        }

        if ($postModel->delete()) {
            header('Location: /post/index');
        } else {
            header('Location: /post/index');
        }
    }

    public function show($id)
    {
        $postModel = $this->model('Post');
        $post = $postModel->getPostById($id);
        $this->view('post/show', ['post' => $post]);
    }

    private function uploadMedia()
    {
        $targetDir = "../public/uploads/";
        $mediaFile = $_FILES['media'];
        $targetFile = $targetDir . basename($mediaFile['name']);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($mediaFile["tmp_name"]);
        if ($check !== false || $fileType == 'mp4' || $fileType == 'mp3') {
            if (move_uploaded_file($mediaFile["tmp_name"], $targetFile)) {
                return basename($mediaFile['name']);
            }
        }
        return '';
    }
}
