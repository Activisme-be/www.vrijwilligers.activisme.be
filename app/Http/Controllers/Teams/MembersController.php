<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

/**
 * Class MembersController
 *
 * @package App\Http\Controllers\Teams
 */
class MembersController extends Controller
{
    /**
     * MembersController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', '2fa', 'forbid-banned-user', 'role:admin|webmaster']);
    }

    /**
     * Method for getting all the teams that are assigned to the given team.
     *
     * @param  Team $team   The database resource entity from the given team.
     * @return Renderable
     */
    public function index(Team $team): Renderable
    {
        return view('teams.members.index', ['members' => $team->members()->paginate(), 'team' => $team]);
    }

    public function create(Team $team): Renderable
    {
        return view('teams.members.create', compact('team'));
    }
}
