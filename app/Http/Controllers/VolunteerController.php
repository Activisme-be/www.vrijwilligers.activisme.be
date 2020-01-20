<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteerFormRequest;
use Illuminate\Contracts\Support\Renderable;
use App\Repositories\Eloquent\VolunteersRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

/**
 * Class VolunteerController
 *
 * @package App\Http\Controllers
 */
class VolunteerController extends Controller
{
    private VolunteersRepository $volunteerRepository;

    public function __construct(VolunteersRepository $volunteerRepository)
    {
        $this->middleware(['auth', '2fa', 'forbid-banned-user', 'portal:application']);
        $this->volunteerRepository = $volunteerRepository;
    }

    public function index(?string $filter = null): Renderable
    {
        return view('volunteers.index', ['volunteers' => $this->volunteerRepository->paginate($filter)]);
    }

    public function create(): Renderable
    {
        return view('volunteers.create');
    }

    public function store(VolunteerFormRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request): void {
            $this->volunteerRepository->store($request);
        });

        return redirect()->route('volunteer.index');
    }
}
