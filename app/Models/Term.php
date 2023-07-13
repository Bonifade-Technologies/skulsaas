<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Term extends Model
{
    use HasFactory;

    protected $guarded = [];

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