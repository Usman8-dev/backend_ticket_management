<?php

namespace App\Http\Controllers;

use App\Models\BusModel;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
{
    $buses = BusModel::all();
    return view('buses', compact('buses'));
}

public function store(Request $request)
{
    $request->validate([
        'bus_number' => 'required|integer|unique:buses,bus_number',
        'capacity' => 'required|integer|min:2',
        'type' => 'required|in:Standard,Luxury'
    ]);

    BusModel::create($request->all());
    return redirect()->back()->with('success', 'Bus added successfully.');
}

public function update(Request $request, $id)
{
    $bus = BusModel::findOrFail($id);

    $request->validate([
        'bus_number' => 'required|integer|unique:buses,bus_number,' . $id,
        'capacity' => 'required|integer|min:2',
        'type' => 'required|in:Standard,Luxury'
    ]);

    $bus->update($request->all());
    return redirect()->back()->with('success', 'Bus updated successfully.');
}

public function destroy($id)
{
    BusModel::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Bus deleted successfully.');
}

}
