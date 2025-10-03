<?php

namespace App\Http\Controllers;

use auth;
use App\Models\TripModel;
use App\Models\ticketsModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class BookTicketController extends Controller
{
  
    public function index(Request $request)
{
    $query = TripModel::with('bus');

    if ($request->filled('route')) {
        $query->where('route', $request->route);
    }

    if ($request->filled('date')) {
        $query->whereDate('date', $request->date);
    }

    if ($request->filled('price')) {
        $query->where('price', '<=', $request->price);
    }

    $trips = $query->get();
    $availableRoutes = TripModel::select('route')->distinct()->pluck('route');

    return view('Book_Ticket', compact('trips', 'availableRoutes'));
}

public function selectSeat($trip_id)
{
    $trip = TripModel::with('bus')->findOrFail($trip_id);
    
    // Optionally fetch already booked seats
    $bookedSeats = ticketsModel::where('trip_id', $trip_id)->pluck('seat_number')->toArray();

    return view('select_seat', compact('trip', 'bookedSeats'));
}

public function bookTicket(Request $request)
{
    $request->validate([
        'trip_id' => 'required|exists:trip,id',
        'seat_number' => 'required|integer',
        'name' => 'required|string',
        'cnic' => 'required|string',
    ]);

    // Prevent double booking
    $alreadyBooked = ticketsModel::where('trip_id', $request->trip_id)
                    ->where('seat_number', $request->seat_number)
                    ->exists();

    if ($alreadyBooked) {
        return back()->with('error', 'This seat is already booked!');
    }

    // Store ticket
    ticketsModel::create([
        'trip_id' => $request->trip_id,
        'seat_number' => $request->seat_number,
        'name' => $request->name,
        'cnic' => $request->cnic,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('My_Ticket')->with('success', 'Ticket booked successfully!');
}

public function myTickets()
{
    $tickets = ticketsModel::with(['trip.bus'])->where('user_id', auth()->id())->get(); // adjust if needed
    return view('My_Ticket', compact('tickets'));
}

public function downloadTicket($id)
{
    $ticket = ticketsModel::with(['trip.bus'])->findOrFail($id);

    // Optional: authorize that the logged-in user owns this ticket
    if ($ticket->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $pdf = Pdf::loadView('pdf', compact('ticket'));
    return $pdf->download('ticket_' . $ticket->id . '.pdf');
}

}
