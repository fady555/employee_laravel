<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Arabic implements Rule
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
        $result = preg_match("/\p{Arabic}/u", $value);

        if($result){ return true;}else{return false;}
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The input must be an arabic.';
    }
}
