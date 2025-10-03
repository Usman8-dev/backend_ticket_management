@extends('layout.adminPanal')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">Edit Trip</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('trips.update', $trip->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="route" class="form-label">Route</label>
                            <input type="text" class="form-control @error('route') is-invalid @enderror" id="route" 
                                   name="route" value="{{ old('route', $trip->route) }}" required>
                            @error('route')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                      
                        <div class="mb-3">
                            <label class="form-label">Bus</label>
                            <select name="bus_id" class="form-select" required>
                                @foreach($buses as $bus)
                                    <option value="{{ $bus->id }}" {{ $trip->bus_id == $bus->id ? 'selected' : '' }}>
                                        {{ $bus->bus_number }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="departure_time" class="form-label">Departure Time</label>
                                <input type="time" class="form-control @error('departure_time') is-invalid @enderror" 
                                       id="departure_time" name="departure_time" 
                                       value="{{ old('departure_time', $trip->departure_time) }}" required>
                                @error('departure_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="arrival_time" class="form-label">Arrival Time</label>
                                <input type="time" class="form-control @error('arrival_time') is-invalid @enderror" 
                                       id="arrival_time" name="arrival_time" 
                                       value="{{ old('arrival_time', $trip->arrival_time) }}" required>
                                @error('arrival_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" value="{{ $trip->date }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" 
                                   name="price" value="{{ old('price', $trip->price) }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('trips.index') }}" class="btn btn-secondary me-md-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Trip</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection