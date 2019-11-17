<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

/**
 * Class TeamController
 *
 * @package App\Http\Controllers\Teams
 */
class TeamController extends Controller
{
    /**
     * TeamController constructor.
     *
     * @eturn void
     */
    public function __construct()
    {
        $this->middleware(['auth', '2fa', 'forbid-banned-user', 'portal:application']);
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
