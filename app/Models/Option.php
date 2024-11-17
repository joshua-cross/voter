<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property int $poll_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Poll|null $poll
 * @method static \Database\Factories\OptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option wherePollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option withoutTrashed()
 * @mixin \Eloquent
 */
class Option extends Model
{
    use SoftDeletes, HasFactory;

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }

    public function percentageOfVotes(): float
    {
        $option = $this;
        if (count($option->responses) === 0) {
            return 0;
        }

        $poll = $option->poll;
        $allResponsesCount = 0;
        foreach ($poll->options as $theOption) {
            $allResponsesCount += $theOption->responses->count();
        }

        return round((count($option->responses) / $allResponsesCount) * 100, 2);
    }
}
