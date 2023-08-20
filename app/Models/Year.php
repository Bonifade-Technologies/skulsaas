<?php

namespace App\Models;

use App\Traits\BelongsToTerm;
use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
    use HasFactory, BelongsToTerm, SoftDeletes, FilterByTenant;
    protected $guarded = [];

    static function boot()
    {
        parent::boot();

        // make all the session current to first and make the recent one to be true
        self::creating(function ($model) {
            Year::query()->update(['is_current' => false]);
            $model->is_current = true;
        });


        // after deletion of current session make the last one the current session
        self::deleted(function () {
            $year = Year::query()->orderByDesc('id')->first();
            if ($year) {
                $year->update(['is_current' => true]);
            }
        });
    }
}