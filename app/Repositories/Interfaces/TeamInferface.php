<?php

namespace App\Repositories\Interfaces;

use Nette\Utils\Paginator;

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
}
