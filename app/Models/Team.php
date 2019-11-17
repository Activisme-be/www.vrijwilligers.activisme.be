<?php

namespace App\Models;

use App\Models\Relations\HasCreator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Team
 *
 * @package App\Models
 */
class Team extends Model
{
    use HasCreator;

    /**
     * The protected fields from the internal mass-assignment system.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Data relation for all the volunteers that are attached to the team.
     *
     * @todo Register this in a trait.
     *
     * @return BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_members')
            ->withPivot(['member_since', 'deactivated_at']);
    }
}
