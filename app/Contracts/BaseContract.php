<?php

namespace App\Contracts;

interface BaseContract
{
    /**
     * Create a record.
     *
     * @param array $attributes The attributes for the new record.
     * @return Model The created model instance.
     */
    public function create(array $attributes);

    /**
     * Update a record.
     *
     * @param array $attributes The attributes to update.
     * @param int $id The ID of the record to update.
     * @return bool True on success, false on failure.
     */
    public function update(array $attributes, int $id);

    /**
     * Get a record with relations.
     *
     * @param mixed $relations The relations to eager load.
     * @return Model The model instance.
     */
    public function with($relations);
}
