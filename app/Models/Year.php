<?php

namespace App\Models;

use App\Traits\BelongsToTerm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
    use HasFactory, BelongsToTerm, SoftDeletes;
    protected $guarded = [];

    static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            Year::query()->update(['is_current' => false]);
            $model->is_current = true;
        });
    }
}