<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;

class AdminController extends Controller
{
    public function index()
    {
        $users = CustomerModel::all();
        return view('admin_dashboard', compact('users'));
    }
    public function updateRole(Request $request, $id)
    {
        $user = CustomerModel::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('admindashboard')->with('success', 'Role updated successfully!');
    }
    public function deleteUser($id)
{
    $user = CustomerModel::findOrFail($id);
    $user->delete();

    return back()->with('success', 'User deleted successfully.');
}
}
