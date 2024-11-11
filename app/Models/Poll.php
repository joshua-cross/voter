<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property int $public
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Option> $options
 * @property-read int|null $options_count
 * @method static \Database\Factories\PollFactory factory($count = null, $state = [])
 * @method static Builder<static>|Poll newModelQuery()
 * @method static Builder<static>|Poll newQuery()
 * @method static Builder<static>|Poll query()
 * @method static Builder<static>|Poll whereCreatedAt($value)
 * @method static Builder<static>|Poll whereId($value)
 * @method static Builder<static>|Poll wherePublic($value)
 * @method static Builder<static>|Poll whereTitle($value)
 * @method static Builder<static>|Poll whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Poll extends Model
{
    use HasFactory;

    public static function scopePublic(Builder $query): Builder
    {
        return $query
            ->where('public', "=", 1);
    }

    public static function scopeActive(Builder $query): Builder
    {
        return $query
            ->whereNotNull("expiry_date")
            ->where("expiry_date", ">=", Carbon::now());
    }

    public function formattedExpiryDate(): string
    {
        $carbon = new Carbon($this->expiry_date);
        return $carbon->format('Y-m-d h:m:s');
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
