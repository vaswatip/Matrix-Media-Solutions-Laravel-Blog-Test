<?php

namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseContract
{
    /**
     * The model instance.
     *
     * @var Model
     */
    protected $model;

    /**
     * Constructor to bind model to repo.
     *
     * @param Model $model The model instance.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create a record.
     *
     * @param array $attributes The attributes for the new record.
     * @return Model The created model instance.
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a record.
     *
     * @param array $attributes The attributes to update.
     * @param int $id The ID of the record to update.
     * @return bool True on success, false on failure.
     */
    public function update(array $attributes, int $id) 
    {
        return $this->find($id)->update($attributes);
    }

    /**
     * Get a record with relations.
     *
     * @param mixed $relations The relations to eager load.
     * @return Model The model instance.
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}