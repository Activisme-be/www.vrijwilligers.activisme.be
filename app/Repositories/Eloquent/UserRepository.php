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
}
