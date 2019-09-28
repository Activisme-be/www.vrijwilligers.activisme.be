<?php

namespace App\Http\Controllers;

use DebugBar\DataCollector\Renderable;
use Illuminate\Http\Request;

/**
 * Class ResetTwoFactorController
 *
 * @package App\Http\Controllers
 */
class ResetTwoFactorController extends Controller
{
    /**
     * ResetTwoFactorController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'forbid-banned-user']);
    }

    /**
     * Method for resetting the 2fa recovery from the user.
     *
     * @param  Request $request The instance that contains all the request data.
     * @return Renderable
     */
    public function index(Request $request): Renderable
    {
        return view('recovery-2fa');
    }
}
