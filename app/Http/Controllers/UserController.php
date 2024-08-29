<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(Request $request) {
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

        try {
            $user->save();
        } catch (\Throwable $th) {
            return back()
                ->withErrors(['Settings could not be modified.']);
        }

        return back()
            ->withSuccess('Settings have been updated.');
    }
}
