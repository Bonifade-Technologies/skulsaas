<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    function settings(): HasOne
    {
        return $this->hasOne(Setting::class);
    }

    static function boot()
    {
        parent::boot();
        self::creating(function ($tenant) {
            $tenant->settings([
                'school_name' => $tenant->name,
                'school_country' => 'Nigeria',
                'country_code' => '+234',
                'school_email' => 'info' . Str::slug($tenant->name) . '.com',
            ])->create();
        });
    }
}