<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

/**
 * Class ProjectController
 *
 * @package App\Http\Controllers\Projects
 */
class ProjectController extends Controller
{
    /**
     * The project database layer implementation.
     *
     * @var ProjectRepository $projectRepository
     */
    private $projectRepository;

    /**
     * MembersController constructor.
     *
     * @param ProjectRepository $projectRepository The project repository implementation.
     * @return void
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->middleware(['auth', '2fa', 'forbid-banned-user', 'role:admin|webmaster']);
        $this->projectRepository = $projectRepository;
    }

    /**
     * Method for displaying the project overview in the application.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('projects.overview', ['projects' => $this->projectRepository->getAllProjects()]);
    }
}
