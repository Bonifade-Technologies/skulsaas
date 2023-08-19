<?php

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
?>