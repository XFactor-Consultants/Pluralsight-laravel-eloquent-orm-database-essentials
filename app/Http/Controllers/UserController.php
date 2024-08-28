<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function save(Request $request) {
        $request->validate([
            'name' => 'required|filled',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->withSuccess('Information has been updated.');
    }}
