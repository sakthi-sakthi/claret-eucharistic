<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUsersList()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function showUsersForm()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|string',
        ]);

        $users = User::find($id);
        
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->role = $request->input('role');
        if ($request->filled('password')) {
            $users->password = Hash::make($request->input('password'));
        }

        $users->save();

        return redirect()->route('admin.users.index')->with('success', 'User data updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        }

        return redirect()->route('admin.users.index')->with('error', 'User not found.');
    }
}
