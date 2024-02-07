<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\Post\PostRepository;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * The post repository instance.
     *
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * PostController constructor.
     *
     * @param PostRepository $postRepository The post repository instance.
     */
    public function __construct( PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->postRepository->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request The request instance.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $isPostCreated = $this->postRepository->createPost($request->all());

        return redirect()->route('posts.index')->with(
            ($isPostCreated['status'] ? 'success' : 'error'), 
            $isPostCreated['message']
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post The post instance.
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request The request instance.
     * @param  \App\Models\Post  $post The post instance.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $isPostUpdated = $this->postRepository->updatePost($post->id, [
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('posts.index')->with(
            ($isPostUpdated['status'] ? 'success' : 'error'), 
            $isPostUpdated['message']
        );
    }
}
