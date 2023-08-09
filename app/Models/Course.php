<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $data)
 */
class Course extends Model
{
    use HasFactory;


    /**
     * @var string[]
     */
    protected $fillable = ['title', 'is_active', 'start_at', 'end_at', 'created_by'];

    /**
     * @var string[]
     */
    protected $casts = ['is_active' => 'boolean'];

    /**
     * @var string[]
     */
    protected $appends = ['days', 'status'];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return HasMany
     */
    public function courseEvaluations(): HasMany
    {
        return $this->hasMany(CourseEvaluation::class);
    }

    /**
     * @return int
     */
    public function getDaysAttribute(): int
    {
        $numberOfDays = 0;
        if ($this->start_at && $this->end_at) {
            $startAt = Carbon::parse($this->start_at);
            $endAt = Carbon::parse($this->end_at);

            // Calculate the difference and add 1 if start and end dates are the same
            $numberOfDays = $endAt->diffInDays($startAt) + ($startAt->equalTo($endAt) ? 1 : 0);
        }
        return $numberOfDays;
    }

    /**
     * @return string
     */
    public function getStatusAttribute(): string
    {
        return $this->is_active ? 'فعالة' : 'غير فعالة';
    }

}
