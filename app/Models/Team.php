<?php

namespace App\Models;

use App\Models\Relations\HasCreator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
     * Data relation for the team owner.
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Association shortcut for the team owner.
     *
     * @param  User $user The resource entity from the given user.
     * @return $this
     */
    public function setOwner(User $user): self
    {
        $this->owner()->associate($user)->save();
        return $this;
    }

    /**
     * Data relation for all the volunteers that are attached to the team.
     *
     * @return BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_members')
            ->withPivot(['member_since', 'deactivated_at']);
    }
}
