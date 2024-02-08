<?php
namespace App\Repositories\Post;

use DB;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Jobs\SendNewPostNotification;
use App\Contracts\Post\PostContract;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepository;

class PostRepository extends BaseRepository implements PostContract
{
    /**
     * The user repository instance.
     *
     * @var UserRepository
     */
    protected $userRepossitory;

    /**
     * PostRepository constructor.
     *
     * @param Post $model The post model instance.
     * @param UserRepository $userRepository The user repository instance.
     */
    function __construct(Post $model, UserRepository $userRepossitory)
    {
        parent::__construct($model);
        $this->userRepossitory = $userRepossitory;
    }
    
    /**
     * Create a new post.
     *
     * @param array $data The data for the new post.
     * @return mixed The created post.
     */
    public function createPost(array $params)
    {
        try{
            DB::beginTransaction();

            $currentUser = $this->userRepossitory->getCurrentUser();
            
            $post = $currentUser->posts()->create([
                'title' => $params['title'],
                'description' => $params['description'],
                'slug' => Str::slug($params['title']), // Generate slug from title
                'is_active' => true, // Assuming all posts are active by default
            ]);

            event(new PostCreated($post)); // Broadcasting event
            SendNewPostNotification::dispatch($post); // Dispatching job for sending email notification

            DB::commit();
            
            return [
                'status' => true,
                'message' => 'Post created sucessfully.'
            ];
        }catch(\Exception $e){
            DB::rollBack();

            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updatePost($postId, array $params)
    {
        try{
            DB::beginTransaction();
            $this->update($params, $postId);

            DB::commit();
            
            return [
                'status' => true,
                'message' => 'Post details updated sucessfully.'
            ];
        }catch(\Exception $e){
            DB::rollBack();

            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Retrieve all posts.
     *
     * @return mixed A collection of all posts.
     */
    public function getAllPosts()
    {
        return $this->with(['user', 'comments'])->get();
    }
}
