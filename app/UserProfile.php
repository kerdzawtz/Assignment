<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Encryptable;

class UserProfile extends Model
{
    use Encryptable;

    protected $table = 'user_profiles';

    protected $encryptable = [
        'lastname',
        'firstname',
        'middlename',
        'suffix'
    ];


    public function getLastName($value)
    {
        return $value;
    }

    public function getFirstName($value)
    {
        return $value;
    }

    public function getMiddleName($value)
    {
        return $value;
    }
    
    public function getSuffix($value)
    {
        return $value;
    }


    protected $fillable = [
        'user_id_fk',
        'email',
        'lastname', 
        'firstname', 
        'middlename',
        'suffix',
        'gender',
        'mobile_number'
    ];

    public function users()
    {
        return $this->hasOne('App\User', 'id', 'user_id_fk');
    }
}
