<?php

namespace App\Repositories\Eloquent;

use App\Models\Volunteer;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class VolunteersRepository
{
    public function paginate(?string $filter, int $perPage = 25, array $columns = ['*']): Paginator
    {
        $query = Volunteer::query();

        switch ($filter) {
            case 'actief':      return $query->active()->paginate($perPage, $columns);
            case 'non-actief':  return $query->isNotActive()->paginate($perPage, $columns);
            default:            return $query->paginate($perPage, $columns);
        }
    }

    public function store(Request $input): void
    {
        $volunteer = Volunteer::create($input->all());

        if (Volunteer::count() > 0) {
            flash(ucfirst($volunteer->name) . ' is toegevoegd al vrijwilliger in de applicatie.');
        }
    }
}
