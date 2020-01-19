<?php

namespace App\Repositories\Eloquent;

use App\Models\Volunteer;
use Illuminate\Contracts\Pagination\Paginator;

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
}
