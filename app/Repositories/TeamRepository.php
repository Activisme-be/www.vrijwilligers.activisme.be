<?php

namespace App\Repositories;

use App\Models\Team;
use Illuminate\Contracts\Pagination\Paginator;
use MrAtiebatie\Repository;

/**
 * Class TeamRepository
 *
 * @package App\Repositories
 */
class TeamRepository
{
    use Repository;

    /**
     * The model being queried.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * TeamRepository constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = app(Team::class);
    }

    /**
     * Method for getting all the teams in the repository.
     *
     * @return Paginator
     */
    public function all(): Paginator
    {
        return $this->model->withCount('members')->paginate();
    }
}
