<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $inputs = $request->only('email', 'password');
        $user = User::where('email', $inputs['email'])->first();

        if ($user) {
            return response()->json([
                'status' => 200,
                'msg' => 'OK',
            ]);
        }

        return response()->json([
            'status' => 404,
            'msg' => 'FAIL',
        ]);
    }
}
