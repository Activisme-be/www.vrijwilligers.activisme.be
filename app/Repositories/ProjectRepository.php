<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ProjectRepository
 *
 * @package App\Repositories
 */
class ProjectRepository
{
    /**
     * Query builder for getting all the projects from the database.
     *
     * @return Paginator
     */
    public function getAllProjects(): Paginator
    {
        return Project::paginate();
    }
}
