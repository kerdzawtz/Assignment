<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Hash;

class PasswordComplexity implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $type;

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
       
        
        if(auth()->user())
        {
            $password = auth()->user()->password;
        
            if(Hash::check($value,$password))
            {
                $this->type = 0;
                return false;
            }
        }

        if (preg_match('/[0-9]/', $value) !== 1) {
            $this->type = 1;
            return false;
        }
    
        if (preg_match('/[a-z]/', $value) !== 1) {
            $this->type = 2;
            return false;
        }
    
        if (preg_match('/[A-Z]/', $value) !== 1) {
            $this->type = 3;
            return false;
        }
        
        if (preg_match('/[!@#$%^&*()]/', $value) !== 1) {
            $this->type = 4;
            return false;
        }

        if(strlen($value) < 8){
            $this->type = 5;
            return false;
        }
        

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch($this->type)
        {
            case 0:
                return 'new password cannot be the same as old pasword';
                break;
            case 1:
                return 'password has no number';
                break;
            case 2:
                return 'password has no lower case letter';
                break;
            case 3:
                return 'password has no upper case letter';
                break;
            case 4:
                return 'password has no special characters';
                break;
            case 5:
                return 'password must be at least 8 characters';
                break;
        }
        
    }
}
