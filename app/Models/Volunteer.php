<?php

namespace App\Models;

use Carbon\Carbon;
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

    /**
     * Fields that are indicated as time or data values.
     *
     * @var array
     */
    protected $dates = ['deactivated_at', 'birth_date'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeIsNotActive(Builder $query): Builder
    {
        return $query->where('is_active', false);
    }

    public function setBirthDateAttribute($value): void
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
