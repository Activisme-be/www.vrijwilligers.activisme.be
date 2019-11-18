<?php

namespace App\Repositories;

use App\Models\Note;
use App\Repositories\Interfaces\NotesInterface;
use Illuminate\Contracts\Pagination\Paginator;
use MrAtiebatie\Repository;

/**
 * Class NoteRepository
 *
 * @package App\Repositories
 */
class NoteRepository implements NotesInterface
{
    use Repository;

    /**
     * The model being queried.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * TeamRepository constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = app(Note::class);
    }

    /**
     * Method for getting all the notes out of the database storage.
     *
     * @return Paginator
     */
    public function all(): Paginator
    {
        return $this->model->paginate();
    }
}
