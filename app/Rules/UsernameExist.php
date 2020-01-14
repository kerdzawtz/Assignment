<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;
class UsernameExist implements Rule
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
        $userExist = User::where('username','=',$value)->select('username')->get();
        if($userExist->isEmpty()){
            return true;
        } else {
            $userIdentical = $userExist[0]->username === $value;
            return (!$userIdentical);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Username already exist.';
    }
}
