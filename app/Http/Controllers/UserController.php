<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    // Show all the users・ページを開けるとき、全部のユーザー情報を見せるため
    public function index()
{
    $users = User::all();
    return view('users.index', compact('users'));
}

    //SearchBar・サーチバー
    public function search(Request $request)
    {
        $query = User::query();

        if ($request->filled('user_id')) {
            $query->where('user_id', 'like', $request->user_id . '%');
        }

        if ($request->filled('user_name')) {
            $query->where('name', 'like', '%' . $request->user_name . '%');
        }

        $users = $query->get();
        return view('users.index', compact('users'));
    }

    // Create user・新しいユーザーの作成
    public function create()
    {
        return view('users.create');
    }

    // Store new user info・新しいユーザー情報を保存するため
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|alpha_num',
            'user_name' => 'required',
            'password' => 'required|alpha_num|min:8', // Min 8 characters for password
        ], [
            'user_id.required' => 'User ID is required.',
            'user_id.alpha_num' => 'User ID must contain only alphanumeric characters.',
            'user_name.required' => 'User name is required.',
            'password.required' => 'Password is required.',
            'password.alpha_num' => 'Password must contain only alphanumeric characters.',
            'password.min' => 'Password must be at least 8 characters long.'
        ]);
        User::create([
            'user_id' => $validated['user_id'],  // Assuming DB column is 'user_id'
            'name' => $validated['user_name'],
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // Edit the user info・ユーザー情報を更新するため
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update a user・ユーザー情報を更新するため
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'password' => 'required|alpha_num',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'user_id' => 'required|alpha_num',
            'name' => $validated['user_name'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('users.index');
    }

    // Delete a user・ユーザー情報を消すため
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }
}