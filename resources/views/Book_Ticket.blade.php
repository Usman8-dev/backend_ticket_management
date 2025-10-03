@extends('dashboard')

@section('title', 'Book Ticket')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('dashboard') }}" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="route" class="form-label">Route</label>
                    <select name="route" id="route" class="form-select">
                        <option value="">All Routes</option>
                        @foreach ($availableRoutes as $route)
                            <option value="{{ $route }}" {{ request('route') == $route ? 'selected' : '' }}>
                                {{ $route }}
                            </option>
                        @endforeach
                    </select>
                </div>
    
                <div class="col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
                </div>
    
                <div class="col-md-3">
                    <label for="price" class="form-label">Min Price</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="e.g. 1000" value="{{ request('price') }}">
                </div>
    
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>
        </div>
    </div>
    <h2 class="mb-4">Available Trips</h2>

    <div class="row">
        @forelse($trips as $trip)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong>Route  ➔ </strong> {{ $trip->route }}
                        </h5>
                        <p class="card-text">
                            <strong>Departure Time:</strong> {{ $trip->departure_time }}
                        </p>
                        <p class="card-text">
                            <strong>Price:</strong> Rs {{ $trip->price }}
                        </p>
                        <p class="card-text">
                        
                            <strong>Bus Number:</strong> {{ $trip->bus->bus_number ?? 'N/A' }}
                        </p>
                        <p class="card-text">
                            <strong>Date:</strong> Rs {{ $trip->date }}
                        </p>
                        {{-- <a href="{{route('select_seat')}}" class="btn btn-primary w-100">Select Seat</a> --}}
                        <a href="{{ route('select_seat', ['trip_id' => $trip->id]) }}" class="btn btn-primary w-100">Select Seat</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">No trips available at the moment.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
