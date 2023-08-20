<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Tenant;
use App\Traits\HasOneProfile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasOneProfile;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    static function boot()
    {
        parent::boot();
        // creation of automatic school id
        self::creating(function ($model) {
            $model->school_id = IdGenerator::generate(['table' => 'users', 'field' => 'school_id', 'length' => 12, 'prefix' => 'ST' . date('y') . '/']);
        });

        self::created(function ($model) {
            $model->profile()->create([
                'status' => 'active'
            ]);
        });
    }
}