<?php

namespace App\Helpers;

use Symfony\Component\HttpKernel\Tests\Controller;
use App\User;
use Auth;
use Doctrine\DBAL\Schema\Index;
use App\UserProfile;
use PHPUnit\Framework\Exception;
use Illuminate\Http\Request as ApiRequest;
use Request;
use DB;
use Spatie\Permission\Models\Permission;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Helper
{
    public static function removeHtmlTagsOfFields(array $inputs, array $excepts = null)
    {
        $inputOriginal = $inputs;

        $inputs = array_except($inputs, $excepts);

        foreach ($inputs as $index => $in) {
            $inputs[$index] = strip_tags($in);
        }

        if (!empty($excepts)) {

            foreach ($excepts as $except) {
                $inputs[$except] = $inputOriginal[$except];
            }
        }

        return $inputs;
    }

    public static function ifDetailsIsNull($object, $params)
    {
        if ($object->getOriginal($params) == NULL) {
            $inputs = NULL;
        } else {
            $inputs = $object->$params;
        }
        return $inputs;
    }

    /**
     * @param string $field
     *
     * @return string
     */
    public static function removeHtmlTagsOfField(string $field)
    {
        return htmlentities(strip_tags($field), ENT_QUOTES, 'UTF-8');
    }

    public static function getNameById($id = null)
    {
        try {
            $id = $id ? $id : auth()->user()->id;
            $user =  UserProfile::where('user_id_fk', '=', $id)->get()->first();
            $name = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname . ' ' . $user->suffix;
            return $name;
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    function getAllUsers()
    {
        try {
            $id = auth()->user()->id;
            $result = [];
            $users = User::where('id', '!=', $id)->get();
            if ($users) {

                foreach ($users as $user) {
                    $result[] = $user->id;
                }
                return $result;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    function getCurrentGender()
    {
        try {
            $profile = UserProfile::where('user_id_fk', '=', auth()->user()->id)->first();
            if ($profile->gender) {
                return $profile->gender;
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return null;
    }

    public static function userGender()
    {
        try {
            $profile = UserProfile::where('user_id_fk', '=', auth()->user()->id)->first();
            if ($profile->gender) {
                return $profile->gender;
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return null;
    }

    function getEmailById($id = null)
    {
        try {
            $id = ($id) ? $id : auth()->user()->id;
            $profile = UserProfile::where('user_id_fk', '=', auth()->user()->id)->first();
            if ($profile->email) {
                return $profile->email;
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return null;
    }
}
