<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Repositories\TeamRepository;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class TeamController
 *
 * @package App\Http\Controllers\Teams
 */
class TeamController extends Controller
{
    /**
     * The repository that this controller is using.
     *
     * @var TeamRepository
     */
    private $teamRepository;

    /**
     * TeamController constructor.
     *
     * @param  TeamRepository $teamRepository   The repository that this controller is using.
     * @return void
     */
    public function __construct(TeamRepository $teamRepository)
    {
        $this->middleware(['auth', '2fa', 'forbid-banned-user', 'portal:application']);
        $this->teamRepository = $teamRepository;
    }

    /**
     * Method for displaying the team overview in the application.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('teams.index', compact('teams'));
    }
}
