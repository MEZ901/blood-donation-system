<?php

namespace App\Http\Controllers;

use App\Models\User;

class RoleController extends Controller
{
    public function switchUserRole(User $user)
    {
        if ($user->hasRole('sub_admin')) {
            $user->removeRole('sub_admin');
        } else {
            $user->assignRole('sub_admin');
        }
        return response()->json([
            "status" => true,
            "message" => "Role has been switched successfully !"
        ]);
    }
}