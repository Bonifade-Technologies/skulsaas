<?php

namespace App\Models;

use App\Traits\BelongsToTerm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory, BelongsToTerm;
    protected $guarded = [];

    static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            Year::query()->update(['is_current' => false]);
            $model->is_current = true;
        });
    }
}