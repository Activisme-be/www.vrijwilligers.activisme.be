<?php

namespace App\Repositories;

use App\Models\Team;
use App\Models\User;
use App\Repositories\Eloquent\UserRepository as UsersRepository;
use App\Repositories\Interfaces\TeamInferface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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

    /** @var Model $model    The model being queried. */
    protected $model;

    /** @var UsersRepository $user */
    private $userRepository;

    /**
     * TeamRepository constructor.
     *
     * @param  UsersRepository
     * @return void
     */
    public function __construct(UsersRepository $userRepository)
    {
        $this->model = app(Team::class);
        $this->userRepository = $userRepository;
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

    /**
     * Method for getting all the members that are assigned to the given team in the application.
     *
     * @param  Team $team The resource entity from the given team.
     * @return Collection
     */
    public function getMembers(Team $team): Collection
    {
        return $team->members;
    }

    public function delete(Team $team): void
    {
        $team->delete();
        auth()->user()->logActivity($team, 'Teams', "Heeft {$team->name} verwijderd als team in de applicatie");

        if (Team::count() > 0) {
            flash()->success("{$team->name} is verwijderd als team uit de applicatie");
        }
    }
}
