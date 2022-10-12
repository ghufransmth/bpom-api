<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class AnggotaController extends BaseController
{
    public function list(Request $request)
    {
        try {
            $members = [];

            $list_members = Member::filterMember($request->filter)
                ->where('user_id', '!=', Auth::user()->id);

            if ($list_members->count() > 0) {
                foreach ($list_members->get() as $key  => $list_member) {
                    if ($list_member->getUser->profile == "0") {
                        $photo_profile = null;
                    } else {
                        $check_existing_file = file_exists($list_member->getUser->profile);

                        if ($check_existing_file) {
                            $photo_profile = asset($list_member->getUser->profile);
                        } else {
                            $photo_profile = null;
                        }
                    }
                    $members[] = [
                        'id' => $list_member->id,
                        'name' => $list_member->name,
                        'position' => $list_member->getPosition->name,
                        'branch' => $list_member->getBranch->name,
                        'photo_profile' => $photo_profile
                    ];
                }
            }

            return $this->successResponse($members, 'Successfully retrieved list member');
        } catch (\Throwable $th) {
            return $this->errorResponse($th, [], 500);
        }
    }
}
