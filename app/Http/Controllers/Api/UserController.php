<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginUser(Request $request) : Response
    {
        $input = $request->all();
        if (Auth::attempt($input)) {
            $user = Auth::user();
            $token = $user->createToken('example')->accessToken;
            return Response(['status' => 200, 'token' => $token], 200);
        } else {
            return Response(['status' => 401, 'message' => 'Unauthorized'], 401);
        }
    }

    public function getUserDetail(): Response
    {
        if(Auth::guard('api')->check()){
            $user = Auth::guard('api')->user();
            return Response(['data' => $user],200);
        }
        return Response(['data' => 'Unauthorized'],401);
    }

    /**
     * Display the specified resource.
     */
    public function userLogout(): Response
    {
        if(Auth::guard('api')->check()){
            $accessToken = Auth::guard('api')->user()->token();

            \DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->id)
                ->update(['revoked' => true]);
            $accessToken->revoke();

            return Response(['data' => 'Unauthorized','message' => 'User logout successfully.'],200);
        }
        return Response(['data' => 'Unauthorized'],401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
