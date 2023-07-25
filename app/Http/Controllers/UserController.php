<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'password' => 'required|string',
            'email' => 'required|string',

        ]);

        // Get profile with matricule
        $user =User::where('email', $attrs['email'])->first();

        if ($user != null) {

            // If user has a password, attemp to login
            if (!Auth::attempt($attrs)) {
                return response([
                    'message' => 'Invalid Credentials'
                ], 403);
            }


            return response([
                'data' =>  $user
            ], 200);

        }

        // If no user found with this matricule return this error
        return response([
            'message' => 'Invalid credentials.'
        ], 403);
    }





    public function createUser(Request $request)
    {
    $attrs = $request->validate([
        'name' => 'required|string',
        'email' => 'required|string',
        'password' => 'required|string'
    ]);

   $user = User::create([
        'name' => $attrs['name'],
        'email' =>  $attrs['email'],
        'password' =>  bcrypt($attrs['password']),
    ]);

    return response([
        'data' =>  $user
    ], 200);

    }

}
