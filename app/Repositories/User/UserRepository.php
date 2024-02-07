<?php
namespace App\Repositories\User;

use App\Contracts\User\UserContract;
use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserContract
{
    /**
     * UserRepository constructor.
     *
     * @param User $model The user model instance.
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Retrieve the current user.
     *
     * @return mixed The current user.
     */
    public function getCurrentUser()
    {
        return $this->model->inRandomOrder()->first();
    }
}