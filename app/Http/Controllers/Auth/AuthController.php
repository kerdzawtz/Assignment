<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Input;
use Response;
use \Cache;
use Exception;
use Validator;
use Redirect;
use Auth;
use Hash;
use DB;
use App\User;
use App\UserProfile;
use App\Helpers\Helper;
use App\Rules\EmailExist;
use App\Rules\UsernameExist;
use App\Rules\PasswordComplexity;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('login.login', ['title' => 'Login']);
    }

    public function postLogin()
    {
        try
        {
            $rules = array(
                'username' => 'required',
                'password' => 'required'
            );
    
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('/')->withErrors($validator); // send back all errors to the login form
            } else {
                // create our user data for the authentication
                $userdata = array(
                    'username' => Input::get('username'),
                    'password' => Input::get('password')
                );
                $user = new User();
                // attempt to do the login
                $result = Auth::attempt($userdata);
                $userData = DB::table('users')->where('username', '=', $userdata['username'])->first();
                if ($result) {
                    /* echo "<pre>";
                    print_r($userData);
                    die('hit'); */
                    if($userData->is_active) {
                        DB::table('users')->where('id', "=", auth()->user()->id)
                            ->update(array(
                                'is_online' => 1
                            ));
                        return Redirect::to('/dashboard');
                    } else {
                        return Redirect::to('/')->withErrors("Your account is deactivated.");
                    }
                } else {
                    /* print_r($datum);
                    die('hits'); */
                    return Redirect::to('/')->withErrors("Wrong password or username.");
                }
            }
        }
        catch(Exception $e)
        {
            dd($e);
        }
    }

    public function logout()
    {
        if((auth()->user())){
            $user = new User;
            $userData = DB::table('users')->where('id', '=', auth()->user()->id)->first();
            DB::table($user->getTable())->where('id', auth()->user()->id)->update(array('is_online' => 0));
        }

        return redirect()->route('auth.getLogin')->with(Auth::logout());
    }

    public function getRegister()
    {
        return view('register.register', ['title' => 'Register']);
    }

    public function postRegister(Request $request)
    {
        $validate = $request->validate([
            'username' => ['required', 'max:225', new UsernameExist],
            'password' => ['required', 'max:255', new PasswordComplexity],
            'email' => ['required', 'max:225', 'email', new EmailExist],
            'lastname' => ['required', 'max:225'],
            'firstname' => ['required', 'max:225'],
            'middlename' => ['max:225'],
            'suffix' => ['max:3'],
            'mobile_number' => ['required', 'regex:/^[0][9]\d{9}$/'],
            'gender' => ['required'],
        ]);
        
        try
        {
            $validated = Helper::removeHtmlTagsOfFields($validate);
            $user = new User();
            $user->username = $validated['username'];
            $user->password = Hash::make($validated['password']);
            $userId = $user->save();
    
            $userProfile = new UserProfile();
            $userProfile->user_id_fk = $user->id;
            $userProfile->email = $validated['email'];
            $userProfile->lastname = $validated['lastname'];
            $userProfile->firstname = $validated['firstname'];
            $userProfile->middlename = $validated['middlename'];
            $userProfile->suffix = $validated['suffix'];
            $userProfile->mobile_number = $validated['mobile_number'];
            $userProfile->gender = $validated['gender'];
            $profileId = $userProfile->save();
            /* $userId = 1;
            $profileId = 1; */
            if ($userId && $profileId) {
                $result = true;
                $datum = ['success' => ($result) ? 'true' : 'false'];
                Auth::loginUsingId($user->id);
                // Cache::forget('users');
            }
            return Response::json($datum);
        } catch(Exception $e) {
            $datum['success'] = "false";
            return Response::json($datum);
        }
    }
}
