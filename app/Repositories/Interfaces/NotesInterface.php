<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

/**
 * Interface NotesInterface
 *
 * @package App\Repositories\Interfaces
 */
interface NotesInterface
{
    /**
     * Method for getting all the notes out of the database storage.
     *
     * @return Paginator
     */
    public function all(): Paginator;
}
