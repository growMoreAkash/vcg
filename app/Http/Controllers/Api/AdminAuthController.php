<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;


class AdminAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $envUsername = env('ADMIN_USERNAME');
        $envPassword = env('ADMIN_PASSWORD');

        if (
            $request->username === $envUsername &&
            Hash::check($request->password, $envPassword)
        ) {
            // Generate token
            $token = Str::random(60);

            // Store token in cache for 24 hours
            Cache::put('admin_token_' . $token, true, now()->addHours(24));

            return response()->json([
                'message' => 'Login successful',
                'token' => $token
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    public function logout(Request $request)
    {
        $token = $request->bearerToken();

        if (!$token || !Cache::has('admin_token_' . $token)) {
            return response()->json([
                'message' => 'Invalid token'
            ], 401);
        }

        Cache::forget('admin_token_' . $token);

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | FORGOT PASSWORD
    |--------------------------------------------------------------------------
    */
    // public function forgotPassword(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required'
    //     ]);

    //     if ($request->username !== env('ADMIN_USERNAME')) {
    //         return response()->json([
    //             'message' => 'Admin not found'
    //         ], 404);
    //     }

    //     return response()->json([
    //         'message' => 'Please contact system administrator to reset password.'
    //     ]);
    // }
}