<?php

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
 return $terms->count() ? \App\Models\Term::with(['year'])->latest()->first() : null;
}
?>