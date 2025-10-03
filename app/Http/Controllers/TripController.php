<?php

namespace App\Http\Controllers;

use App\Models\BusModel;
use App\Models\TripModel;
use Illuminate\Http\Request;

class TripController extends Controller
{
     // Show list of trips
     public function index()
     {
         $trips = TripModel::with('bus')->orderBy('date', 'asc')->get();
         $buses = BusModel::all();
         return view('trips', compact('trips', 'buses'));
     }
     // Store new trip
     public function store(Request $request)
     {
         $request->validate([
             'route' => 'required|string|max:255',
             'bus_id' => 'required|exists:buses,id',
             'departure_time' => 'required|date_format:H:i',
             'arrival_time' => 'required|date_format:H:i|after:departure_time',
             'date' => 'required|date|after_or_equal:today',
             'price' => 'required|integer',
         ]);
 
         TripModel::create([
            'route' => $request->route,
            'bus_id' => $request->bus_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'price' => $request->price,
            'date' => $request->date, 
        ]);
        
 
         return redirect()->route('trips.index')->with('success', 'Trip added successfully.');
     }
 
     public function edit(TripModel $trip)
{
    $buses = BusModel::all(); 
    return view('edit', compact('trip', 'buses'));
}

     // Update trip
     public function update(Request $request, TripModel $trip)
     {
         $request->validate([
             'route' => 'required|string|max:255',
             'bus_id' => 'required|exists:buses,id',
             'departure_time' => 'required|date_format:H:i',
             'arrival_time' => 'required|date_format:H:i|after:departure_time',
             'date' => 'required|date|after_or_equal:today',
             'price' => 'required|integer',
         ]);
 
         $trip->update($request->all());
 
         return redirect()->route('trips.index')->with('success', 'Trip updated successfully.');
     }
 
     // Delete trip
     public function destroy($id)
     {
         TripModel::findOrFail($id)->delete();
         return redirect()->route('trips.index')->with('success', 'Trip deleted successfully.');

     }
}



