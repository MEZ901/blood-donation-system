<?php

namespace App\Http\Controllers;

use App\Http\Resources\auth\LoginCollection;
use App\Http\Resources\auth\LoginResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email or password is incorrect!',
            ], 401);
        }

        $user = Auth::user();

        $image = $user->image()->first();
        $profile = $image ? $image->path : null; 

        $user->token = $token;
        $user->profile = $profile;
        
        return [
            "status" => "success",
            "data" => new LoginResource($user)
        ];
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'cin' => 'required|string|max:255|unique:users',
            'city_id' => 'required|integer|exists:cities,id',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($request->blood_type_id) {
            $request->validate([
                'blood_type_id' => 'required|integer|exists:blood_types,id',
            ]);
        }
        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'cin' => $request->cin,
            'city_id' => $request->city_id,
            'blood_type_id' => $request->blood_type_id ? $request->blood_type_id : null,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $image = null;
        if($request->profile) {
            $image = (new ImageController)->store($request->profile, 'profile');
            $user->image()->create([
                'path' => $image,
            ]);
        }

        $user->assignRole('donor');

        $token = Auth::login($user);
        
        $user->token = $token;
        $user->profile = $image;

        return [
            "status" => "success",
            "data" => new LoginResource($user)
        ];
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorization' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
