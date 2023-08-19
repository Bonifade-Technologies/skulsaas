<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'payment_method' => 'array',
    ];

    static function boot(){
        parent::boot();
        self::created(function($model){
            $don = config(['schoolname' => $model->school_name]);
            // $model->getFirstMedia('setting')->setFileName($don)->save();
            \Log::info(config('schoolname'));
        });
    }

    function registerMediaCollections(): void
    {
        $this->addMediaCollection('setting')
            ->singleFile()
            ->useFallbackUrl(asset('/img/avatar.png'));
    }
}