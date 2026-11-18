<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display All Users
    public function index()
    {
        $users = User::with('roles')->get();

        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:manager,staff',
        ]);

        if ($user->hasRole('admin')) {
            abort(403, 'Admin role cannot be changed.');
        }

        $user->syncRoles([$validated['role']]);

        return back()->with('success', 'User role updated successfully.');
    }
}
