<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Response;
use Exception;
use \Cache;
use Carbon\Carbon;
use Hash;
use App\User;
use App\UserProfile;
use App\Helpers\Helper;
use App\Rules\EmailExist;
use App\Rules\UsernameExist;
use App\Rules\PasswordComplexity;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax()
    {
        $users = User::all();
        $userData = [];
        foreach($users as $userKey => $user) {
            $userData[$userKey]['id']= $user->id;
            $userData[$userKey]['username']= $user->username;
            $userData[$userKey]['is_active']= $user->is_active;
        }
        
        return Response::json(['data' => $userData]);
    }

    public function index()
    {
        return view('app.management.user-index', ['title' => 'User Management']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app/management.user-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    
            if ($userId && $profileId) {
                $datum['success'] = 'true';
                Cache::forget('users');
            }
    
            return Response::json($datum);
        } catch(Exception $e) {
            $datum['success'] = "false";
            return Response::json($datum);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::whereId($id)->get()->first()->toArray();
        return view('app.management.user-edit', ['data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'username' => ['required', 'max:225', Rule::unique('users')->ignore($request->id)],
        ]);

        try
        {
            $validated = Helper::removeHtmlTagsOfFields($validate);
            $user = User::find($request->id);
            $user->username = $validated['username'];
            $result = $user->update();
            $datum = ['success' => ($result) ? 'true' : 'false'];
    
            return Response::json($datum);
        } catch(Exception $e) {
            $datum['success'] = "false";
            return Response::json($datum);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $userData = User::findOrFail($id);
            $oldData = $userData->is_active;
            $status = ($userData->is_active == 1) ? 0 : 1;
            $result = DB::table('users')->where('id', $id)->update(array('is_active' => $status));
    
            $datum = ['success' => ($result) ? 'true' : 'false'];
            Cache::forget('users');
            return Response::json($datum);
        }
        catch(Exception $e)
        {
            $datum['success'] = "false";
            return Response::json($datum);
        }        
    }

    public function delete($id)
    {
        $deleteData = User::findOrFail($id);
        return view('app/management.user-delete', ['data' => $deleteData]);
    }
}
