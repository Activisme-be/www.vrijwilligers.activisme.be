<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamFormRequest;
use App\Models\Team;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\TeamRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class TeamController
 *
 * @package App\Http\Controllers\Teams
 */
class TeamController extends Controller
{
    private TeamRepository $teamRepository;
    private UserRepository $userRepository;

    /**
     * TeamController constructor.
     *
     * @param  TeamRepository $teamRepository   The repository that this controller is using.
     * @param  UserRepository $userRepository   The repository that this controller is using for the user info.
     * @return void
     */
    public function __construct(TeamRepository $teamRepository, UserRepository $userRepository)
    {
        $this->middleware(['auth', '2fa', 'forbid-banned-user', 'portal:application']);

        $this->userRepository = $userRepository;
        $this->teamRepository = $teamRepository;
    }

    /**
     * Method for displaying the team overview in the application.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $teams = $this->teamRepository->all();
        return view('teams.index', compact('teams'));
    }

    /**
     * Method for displaying the create view of a new team.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        $users = $this->userRepository->all(['id', 'achternaam', 'voornaam']);
        return view('teams.create', compact('users'));
    }

    /**
     * Method for creating a new team of volunteers in the  application.
     *
     * @param  TeamFormRequest $request     The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function store(TeamFormRequest $request): RedirectResponse
    {
        $team = DB::transaction(function () use ($request): Team {
            return $this->teamRepository->store($request->user(), $request);
        });

        return redirect()->route('teams.show', $team);
    }

    /**
     * Method to display the team information in the application.
     *
     * @param  Team $team The resource entity from the given team.
     * @return Renderable
     */
    public function show(Team $team): Renderable
    {
        $users = $this->userRepository->all(['id', 'achternaam', 'voornaam']);
        return view('teams.show', compact('team', 'users'));
    }

    /**
     * Method for deleting a team in the application.
     *
     * @param  Request $request  The request instance that holds all the request information.
     * @param  Team    $team     The resource entity from the given team.
     * @return Renderable|RedirectResponse
     */
    public function destroy(Request $request, Team $team)
    {
        if ($request->isMethod('GET')) {
            return view('teams.delete', compact('team'));
        }

        $this->teamRepository->delete($team);
        return redirect()->route('teams.index');
    }
}
