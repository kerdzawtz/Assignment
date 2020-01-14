<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserProfileRequest;
use DB;
use Response;
use Exception;
use \Cache;
use Hash;
use App\User;
use App\UserProfile;
use App\Helpers\Helper;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::where('id','=',$id)->first();
        $profile = $user->userprofile;
        return view('app/management.userprofile-index', ['data' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $profileData = UserProfile::findOrFail($id);
        return view('app/management.userprofile-edit', ['data' => $profileData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(UserProfileRequest $request, $id)
    {
        $oldData = array();
        $validate = $request->validated();
        $validate['suffix'] = $request->suffix;

        $userProfileData = UserProfile::findOrFail($id);
        $validatedProf = Helper::removeHtmlTagsOfFields($validate);

        $result = $userProfileData->update($validatedProf);

        $datum = ['success' => ($result) ? 'true' : 'false'];
        return Response::json($datum);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
