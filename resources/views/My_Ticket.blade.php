@extends('dashboard') {{-- assuming this is your main layout --}}
@section('title', 'My Ticket')

@section('content')
    <h3 class="mb-4">My Booked Tickets</h3>

    @if($tickets->count())
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($tickets as $ticket)
                <div class="col">
                    <div class="card shadow-sm border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Route: {{ $ticket->trip->route }}</h5>
                            <p class="card-text mb-1"><strong>Seat #:</strong> {{ $ticket->seat_number }}</p>
                            <p class="card-text mb-1"><strong>Departure Time:</strong> {{ $ticket->trip->departure_time }}</p>
                            <p class="card-text mb-1"><strong>Bus Number:</strong> {{ $ticket->trip->bus->bus_number }}</p>
                            <p class="card-text mb-1"><strong>Name:</strong> {{ $ticket->name }}</p>
                            <p class="card-text mb-3"><strong>CNIC:</strong> {{ $ticket->cnic }}</p>

                            <a href="{{ route('download.ticket', $ticket->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-download"></i> Download Ticket
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">You haven't booked any tickets yet.</p>
    @endif
@endsection
