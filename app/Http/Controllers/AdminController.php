<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //

    public function assignAdmin($userId)
    {
        $user = User::findOrFail($userId);
        $user->assignRole('admin');

        return redirect()->back()->with('success', 'User assigned as admin successfully.');

    }


    public function revokeAdmin($userId)
    {
        $user = User::findOrFail($userId);
        $user->removeRole('admin');

        return redirect()->back()->with('success', 'Admin role revoked successfully.');
    }


    public function revokeUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->back()->with('success', 'user  revoked successfully.');
    }
}
