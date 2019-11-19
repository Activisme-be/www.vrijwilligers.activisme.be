<?php

namespace App\Repositories;

use App\Models\Team;
use App\Models\User;
use App\Repositories\Interfaces\TeamInferface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use MrAtiebatie\Repository;

/**
 * Class TeamRepository
 *
 * @package App\Repositories
 */
class TeamRepository implements TeamInferface
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

    /**
     * Method for creating an new team of volunteers in the application.
     *
     * @param  User     $user       The database resource entity form the given user.
     * @param  Request  $request    The request data that comes from the form.
     * @return Team
     */
    public function store(User $user, Request $request): Team
    {
        $owner = $this->userRepository->find($request->verantwoordelijke);

        return $this->model->create($request->except('verantwoordelijke'))
            ->setCreator($user)->setOwner($owner);
    }
}
