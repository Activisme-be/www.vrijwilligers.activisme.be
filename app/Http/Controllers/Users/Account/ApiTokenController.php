<?php

namespace App\Http\Controllers\Users\Account;

use App\Http\Controllers\Controller;
use App\Repositories\NoteRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

/**
 * Class ApiTokenController
 *
 * @package App\Http\Controllers\Users\Account
 */
class ApiTokenController extends Controller
{
    /**
     * TeamController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', '2fa', 'forbid-banned-user']);
    }

    /**
     * Method for displaying the api tokens management console.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('users.settings.api-tokens');
    }
}
