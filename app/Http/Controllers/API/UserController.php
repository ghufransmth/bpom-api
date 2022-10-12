<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function profile()
    {
        try {
            $user = User::find(Auth::user()->id, ['id', 'profile', 'nrp', 'fullname']);

            if (empty($user)) {
                return $this->notFoundResponse("Data user not found");
            }

            $check_existing_file = file_exists($user->profile);

            if ($check_existing_file) {
                $photo_profile = asset($user->profile);
            } else {
                $photo_profile = null;
            }

            $data = [
                'id' => $user->id,
                'name' => $user->fullname,
                'nrp' => $user->nrp,
                'profile' => $photo_profile
            ];

            return $this->successResponse($data, 'Successfully retrieved profile user');
        } catch (\Throwable $th) {
            return $this->errorResponse($th, [], 500);
        }
    }
}
