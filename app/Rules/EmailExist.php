<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\UserProfile;
class EmailExist implements Rule
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
        $emailExist = UserProfile::where('email','=',$value)->select('email')->get();
        if($emailExist->isEmpty()){
            return true;
        } else {
            $emailIdentical = $emailExist[0]->email === $value;
            return (!$emailIdentical);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Email already exist.';
    }
}
