<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Repositories\NoteRepository;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class NoteController
 *
 * @package App\Http\Controllers\Notes
 */
class NoteController extends Controller
{
    /**
     * The variable for the note repository that handles the resource logic.
     *
     * @var NoteRepository
     */
    private $noteRepository;

    /**
     * TeamController constructor.
     *
     * @param  NoteRepository $noteRepository   The note repository implementation.
     * @return void
     */
    public function __construct(NoteRepository $noteRepository)
    {
        $this->middleware(['auth', '2fa', 'forbid-banned-user', 'portal:application']);
        $this->noteRepository = $noteRepository;
    }

    /**
     * Method for displaying all the notes in the application.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('noted.index', ['notes' => $this->noteRepository->all()]);
    }
}
