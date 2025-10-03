<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|unique:users,phone_number',
            'password' => 'required|confirmed|min:6',
        ]);

        // $user = CustomerModel::create($data);

        
        $user = CustomerModel::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            // 'password' => $data['password']
            'password' => Hash::make($data['password']),

        ]);

        if ($user) {
            return redirect()->route('loginForm');
        }
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6', 
        ]);

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('loginForm');
        }
    }
    public function logout()
    {
       Auth::logout();
        return redirect()->route('loginForm');
        
    }
}
