<?php
namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait BelongsToTenant
{
 function tenant(): BelongsTo
 {
  return $this->belongsTo(Tenant::class);
 }
 function tenants(): HasMany
 {
  return $this->belongsToMany(Tenant::class);
 }
}


?>