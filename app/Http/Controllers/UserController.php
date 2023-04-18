<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'cin' => 'required|string|max:255|unique:users',
            'city_id' => 'required|integer|exists:cities,id',
            'phone' => 'required|string|max:10|unique:users',
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
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer',
            'cin' => 'sometimes|required|string|max:255|unique:users' . $user->id,
            'city_id' => 'sometimes|required|integer|exists:cities,id',
            'phone' => 'sometimes|required|string|max:10|unique:users' . $user->id,
            'email' => [
                'sometimes',
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)->where(function ($query) use ($request) {
                    return $query->where('email', $request->email);
                })
            ],
            'password' => 'sometimes|required|string|min:6|confirmed',
        ]);

        if ($request->password) {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
        }

        if ($request->blood_type_id) {
            $request->validate([
                'blood_type_id' => 'integer|exists:blood_types,id',
            ]);
        }

        if ($request->profile) {
            if ($user->image) {
                Storage::delete($user->image->path);
                $user->image()->delete();
            }

            $image = (new ImageController)->store($request->profile, 'profile/');
            $user->image()->create([
                'path' => $image,
            ]);
        }

        $user->update($request->all());

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->hospital->delete();
        $user->image->delete();
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}