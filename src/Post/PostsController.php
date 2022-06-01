<?php

namespace App\Post;

class PostsController
{
    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    protected function render($view, $params)
    {
        extract($params);
        include __DIR__ . "/../../views/{$view}.php";
    }

    /* Show all posts */
    public function index()
    {
        $posts = $this->postsRepository->fetchPosts();
        $this->render("post/index", [
            'posts' => $posts
        ]);
    }

    /* Show only one post */
    public function show()
    {
        $id = $_GET['id'];
        $post = $this->postsRepository->fetchPost($id);

        $this->render("post/show", [
            'post' => $post
        ]);
    }


}

?>