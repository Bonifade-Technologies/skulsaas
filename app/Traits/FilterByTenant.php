<?php
namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait FilterByTenant
{
 function tenant(): BelongsTo
 {
  return $this->belongsTo(Tenant::class);
 }

 public static function boot()
 {
  parent::boot();

  self::creating(function ($model) {
   $model->tenant_id = auth()->user()->current_tenant_id;
  });

  self::addGlobalScope(function (Builder $builder) {
   $builder->where('tenant_id', auth()->user()->current_tenant_id);
  });
 }
}


?>