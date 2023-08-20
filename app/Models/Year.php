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
}