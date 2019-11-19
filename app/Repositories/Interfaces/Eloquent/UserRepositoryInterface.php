<?php

namespace App\Repositories\Interfaces\Eloquent;

use Illuminate\Support\Collection;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\Interfaces\Eloquent
 */
interface UserRepositoryInterface
{
    /**
     * Method for finding an user in the application.
     *
     * @param  mixed $id        THe unique user identifier in the application storage.
     * @param  array $columns   The olcumns u want to select for the user.
     * @return mixed
     */
    public function find($id, array $columns = ['*']);

    /**
     * Method for getting the array of user information for form dropdowns.
     *
     * @param  array $columns The columns u want to select from the database.
     * @return Collection
     */
    public function all(array $columns): Collection;
}
