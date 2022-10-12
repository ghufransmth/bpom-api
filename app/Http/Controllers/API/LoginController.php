<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginUser;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginUser $request)
    {
        try {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $user = Auth::user();
                $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                $success['fullname'] =  $user->fullname;
                $success['username'] =  $user->username;
                $success['nrp'] =  $user->nrp;
                $success['nrp'] =  $user->nrp;
                $success['device_id'] =  $user->device_id;
                $success['code_security'] =  $user->code_security;

                return $this->successResponse($success, 'User login successfully.');
            } else {
                return $this->authorizeResponse('Unauthorised.', ['error' => 'Unauthorised'], 401);
            }
        } catch (\Throwable $th) {
            return $this->errorResponse($th, [], 500);
        }
    }

    public function LogonCodeSecurity(Request $request)
    {
        try {
            if (empty(Auth::user())) {
                return $this->authorizeResponse('Unauthorised.', ['error' => 'Unauthorised']);
            }

            if (!Hash::check($request->code_security, Auth::user()->code_security)) {
                return $this->authorizeResponse('User security code is incorrect', ['error' => 'Unauthorised']);
            }

            return $this->successResponse([], 'User security code is correct');
        } catch (\Throwable $th) {
            return $this->errorResponse($th, [], 500);
        }
        return response()->json($request->code_security);
    }
}
