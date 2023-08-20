<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Object_;

function currentUser()
{
 return auth()->user();
}

function currentSession(): object|null
{
 $term = \App\Models\Year::where('is_current', true)->first();
 return $term ?? null;
}
function currentTerm(): object|null
{
 $terms = \App\Models\Term::get();
 return $terms->count() ? \App\Models\Term::with(['year:id,session_name'])->orderByDesc('id')->first() : null;
}

function getCountries()
{
 $countries = Http::get('https://restcountries.com/v3.1/all?fields=name,idd,flags,currencies,capital');
 return $countries;
}

function settings()
{
 return \App\Models\Setting::with('media')->first();
}
function redirectback()
{
 return redirect()->back();
}


function currentUserPermissions(): array|null
{
 $permissions = \App\Models\Permission::
  select('name')
  ->whereRelation('users', 'id', Auth::id())
  ->orWhereRelation('roles', 'id', auth()->user()->current_role_id)
  ->pluck('name')
  ->toArray();
 return $permissions;
}


function statusColor($status)
{
 // $color = "bg-gray-500 text-gray-50";
 switch ($status) {
  case 'active':
   $color = "border-green-500 text-green-500";
   break;
  case 'created':
   $color = "border-green-300 text-green-300";
   break;
  case 'accepted':
   $color = "border-green-500 text-green-500";
   break;
  case 'onLeave':
   $color = "border-orange-400 text-orange-400";
   break;
  case 'credit':
   $color = "border-green-500 text-wgreen-500";
   break;
  case 'debit':
   $color = "border-red-500 text-red-500";
   break;
  case 'graduated':
   $color = "border-red-900 text-red-900";
   break;
  default:
   $color = "bg-gray-500 text-gray-50";
   break;
 }

 return $color;
}
?>