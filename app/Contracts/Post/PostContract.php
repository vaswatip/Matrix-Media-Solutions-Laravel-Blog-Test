<?php

namespace App\Contracts\Post;

interface PostContract
{
    /**
     * Create a new post.
     *
     * @param array $data The data for the new post.
     * @return mixed The created post.
     */
    public function createPost(array $params);

    /**
     * Retrieve all posts.
     *
     * @return mixed A collection of all posts.
     */
    public function getAllPosts();
}