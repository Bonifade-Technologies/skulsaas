<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    function setting(): HasOne
    {
        return $this->hasOne(Setting::class);
    }

    function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }


    static function boot()
    {
        parent::boot();
        self::creating(function ($tenant) {
            $slug = Str::slug($tenant->name);
            $tenant->status = 'created';
            $tenant->domain = $tenant->domain ?? $slug;
        });
        self::created(function ($tenant) {
            $tenant->setting()->create([
                'school_name' => $tenant->name,
                'school_country' => 'Nigeria',
                'country_code' => '+234',
                'school_email' => 'info@' . Str::slug($tenant->name) . '.com',
            ]);
            auth()->user()->update(['current_tenant_id' => $tenant->id]);
            auth()->user()->tenants()->attach($tenant->id); // attach user to tenants if authenticated
        });
    }
}