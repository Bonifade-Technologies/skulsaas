<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SessionRule implements Rule
{
    public $msg;
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
        $res = false;
        // if (preg_match("/\//i", $value)) {
        //     $res = true;
        // } else {
        //     $this->msg = "The session must contain forward slash(/)";
        // }
        // if (preg_match("[^A-Za-z]", $value)) {
        //     $res = true;
        // } else {
        //     $this->msg = "The session must not contain any alphabet";
        // }

        if (str_starts_with($value, "20")) {
            $res = true;
        } else {
            $this->msg = "The session must be in this format " . date('Y') . "/" . date('y') + 1;
        }
        return $res;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->msg;
    }
}