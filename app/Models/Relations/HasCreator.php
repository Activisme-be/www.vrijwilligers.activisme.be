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
}
