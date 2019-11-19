<?php

namespace App\Repositories\Interfaces;

use App\Models\Team;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

/**
 * Interface TeamInferface
 *
 * @package App\Repositories\Interfaces
 */
interface TeamInferface
{
    /**
     * Method for getting all the teams in the database.
     *
     * @return Paginator
     */
    public function all(): Paginator;

    /**
     * Method for creating an new team in the application.
     *
     * @param  User    $user      The resource entity
     * @param  Request $request   The data that the user has filled in the form.
     * @return Team
     */
    public function create(User $user, Request $request): Team;
}
