<?php

use PhpParser\Node\Expr\Cast\Object_;

function currentUser()
{
 return auth()->user();
}

function done()
{
 return "I am working";
}

function currentSession(): object|null
{
 $years = \App\Models\Year::get();
 return $years->count() ? \App\Models\Year::latest()->first() : null;
}
?>