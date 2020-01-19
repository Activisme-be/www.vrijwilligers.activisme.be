<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Volunteer
 *
 * @package App\Models
 */
class Volunteer extends Model
{
    /**
     * Protected fields for the internal mass-assignment system.<
     *
     * @return array
     */
    protected $guarded = ['id'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeIsNotActive(Builder $query): Builder
    {
        return $query->where('is_active', false);
    }
}
