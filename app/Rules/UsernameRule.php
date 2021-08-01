<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class UsernameRule implements Rule
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
        $username = User::where('username',$value)->get();
        dd($username);


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('username no premises');
    }
}
