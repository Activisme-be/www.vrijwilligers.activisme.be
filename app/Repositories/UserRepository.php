<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository extends Authenticatable
{
    /**
     * Method for securing the request by confirming the password hash.
     *
     * @todo refactor to custom validation rule 
     * 
     * @param  string $password The authenticated user password;
     * @return bool
     */
    public function securedRequest(string $password): bool
    {
        return Hash::check($password, $this->getAuthPassword());
    }

    /**
     * Search query scope for users in the application.
     *
     * @param  Builder $query The eloqunet query builder instance.
     * @return Builder
     */
    public function scopeSearch(Builder $query, string $searchTerm): Builder
    {
        return $query->where('voornaam', 'LIKE', "%{$searchTerm}%")
            ->orWhere('achternaam', 'LIKE', "%{$searchTerm}%")
            ->orWhere('email', 'LIKE', "%{$searchTerm}%");
    }
}
