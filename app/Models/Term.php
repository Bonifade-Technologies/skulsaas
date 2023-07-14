<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            Term::query()->update(['is_current' => false]);
            $model->is_current = true;
        });
    }
}