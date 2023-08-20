<?php

namespace App\Rules;

use App\Models\SchoolType;
use Illuminate\Contracts\Validation\Rule;

class UniqueSchoolTypeTenantRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $exist = SchoolType::where('name', $value)->first();

        return $exist ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The school type already exist';
    }
}