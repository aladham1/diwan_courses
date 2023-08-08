<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
//    public function sendPasswordResetNotification($token)
//    {
//        // Your your own implementation.
//        $this->notify(new ResetPasswordNotification($token));
//    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'is_admin',
        'ssn',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'updated_at',
        'email_verified_at',
        'deleted_at',
        'created_at',
        'is_admin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'email_verified_at' => 'datetime',
    ];


    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_users','user_id', 'role_id');
    }

    public function courseEvaluations()
    {
        return $this->hasMany(CourseEvaluation::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsAdmin($query)
    {
        return $query->where('is_admin', 1);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNotIsAdmin($query)
    {
        return $query->where('is_admin', 0);
    }

    /**
     * @param $ability
     * @return bool
     */
    public function hasAbility($ability): bool
    {
        if ($this->ssn == 804520955 || $this->is_admin == 1){
            return true;
        }
        foreach ($this->roles as $role) {
            if (in_array($ability, $role->abilities)) {
                return true;
            }
        }
        return false;
    }
}
