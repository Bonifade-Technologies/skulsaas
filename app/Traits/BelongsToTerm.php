<?php
namespace App\Traits;

use App\Models\Term;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait BelongsToTerm
{
 function term(): BelongsTo
 {
  return $this->belongsTo(Term::class);
 }
 function terms(): HasMany
 {
  return $this->hasMany(Term::class);
 }

}


?>