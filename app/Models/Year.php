<?php

namespace App\Models;

use App\Traits\BelongsToTerm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory, BelongsToTerm;
    protected $guarded = [];
}