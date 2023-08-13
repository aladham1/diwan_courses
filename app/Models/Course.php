<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use function Symfony\Component\Translation\t;

/**
 * @method static create(array $data)
 */
class Course extends Model
{
    use HasFactory;


    /**
     * @var string[]
     */
    protected $fillable = ['title', 'is_active', 'start_at', 'end_at', 'hours','trainer_name', 'created_by'];

    /**
     * @var string[]
     */
    protected $casts = ['is_active' => 'boolean'];

    /**
     * @var string[]
     */
    protected $appends = ['days', 'status','hours_txt'];

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

    public function isActive()
    {
        $currentDate = Carbon::now();
        $activationDate = Carbon::parse($this->end_at); // Assuming your date column is 'start_date'

        if ($currentDate >= $activationDate) {
            return true;
        }
    }

    public function bgColor()
    {
        if ($this->userCanEvaluate()) {
            return "success";
        } else {
            return "primary";
        }
    }

    public function userCanEvaluate(): bool
    {
        $user = auth()->user();
        if ($user->isAssociatedWithCourse($this->id) && $this->isActive()) {
            return true;
        }
        return false;
    }
    public function getHoursTxtAttribute()
    {
        $hours = $this->hours;
        $word = 'ساعة';
        if ($hours === 0 || $hours === 1) {
            $word = 'ساعة';
        }  else if ($hours === 2) {
            $word = 'ساعتين';
        } else if ($hours >= 3 && hours <= 10) {
            $word = 'ساعات';
        }

        return $hours .' '. $word;
    }
}
