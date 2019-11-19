<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\Eloquent\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class UserRepository
 *
 * @package App\Repositories\Eloquent
 */
class UserRepository implements UserRepositoryInterface
{
    /** @var Model $model The model being queried*/
    protected $model;

    /**
     * TeamRepository constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = app(User::class);
    }

    /**
     * Method for getting the array of user information for form dropdowns.
     *
     * @param  array $columns The columns u want to select from the database.
     * @return Collection
     */
    public function all(array $columns): Collection
    {
        return $this->model->all($columns);
    }

    /**
     * Method for finding an user in the application.
     *
     * @param  mixed $id        THe unique user identifier in the application storage.
     * @param  array $columns   The olcumns u want to select for the user.
     * @return mixed
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }
}
