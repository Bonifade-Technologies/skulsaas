<?php

use PhpParser\Node\Expr\Cast\Object_;

function currentUser()
{
 return auth()->user();
}

function currentTerm(): object|null
{
 $terms = \App\Models\Term::get();
 return $terms->count() ? \App\Models\Term::with(['year'])->latest()->first() : null;
}
?>