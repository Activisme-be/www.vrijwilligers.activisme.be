<?php

namespace App\Models\Relations;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Trait HasCreator
 *
 * @package App\Models\Relations
 */
trait HasCreator
{
    /**
     * The data relation for the creator from the database entity.
     *
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->hasOne(User::class);
    }

    /**
     * Method for associating an author to the model entity.
     *
     * @param  User $user The resource entity from given user in the application.
     * @return $this
     */
    public function setAuthor(User $user): self
    {
        $this->creator()->associate($user)->save();
        return $this;
    }
}
