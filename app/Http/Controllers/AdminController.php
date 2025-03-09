<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function assignAdmin($userId)
    {
        $user = User::findOrFail($userId);
        $user->assignRole('admin');

        return redirect()->route('user.manage')->with('success', 'User assigned as admin successfully.');

    }


    public function revokeAdmin($userId)
    {
        $user = User::findOrFail($userId);
        $user->removeRole('admin');

        return redirect()->route('user.manage')->with('success', 'Admin role revoked successfully.');
    }
}
