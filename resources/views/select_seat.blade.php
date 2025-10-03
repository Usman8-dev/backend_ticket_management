@extends('dashboard') 
@section('title', 'Select Seat')

@section('content')
<h4 class="mb-4">Select Seat for Route: {{ $trip->route }} ({{ $trip->bus->bus_number }})</h4>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="border p-3">
            <h5 class="text-center">Bus Seating Layout</h5>
            <div class="seat-layout" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px;">
                @for ($i = 1; $i <= 40; $i++)
                    @php
                        $isBooked = in_array($i, $bookedSeats);
                        // skip column 3 to make aisle effect
                        $column = $i % 5;
                        $skip = $column == 3;
                    @endphp

                    @if ($skip)
                        <div></div>
                    @else
                        <button 
                            class="seat btn {{ $isBooked ? 'btn-secondary' : 'btn-outline-success' }}" 
                            {{ $isBooked ? 'disabled' : '' }}
                            data-seat="{{ $i }}"
                            style="min-width: 55px;">
                            {{ $i }}
                        </button>
                    @endif
                @endfor
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <form action="{{ route('book_ticket') }}" method="POST" id="bookingForm">
            @csrf
            <input type="hidden" name="trip_id" value="{{ $trip->id }}">
            <input type="hidden" name="seat_number" id="seat_number">

            <div class="mb-3">
                <label for="name" class="form-label">Passenger Name</label>
                <input type="text" name="name" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="cnic" class="form-label">CNIC</label>
                <input type="text" name="cnic" required class="form-control">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Book Ticket</button>
            </div>
        </form>
    </div>
</div>

<script>
    const buttons = document.querySelectorAll('.seat');
    const seatInput = document.getElementById('seat_number');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            buttons.forEach(btn => btn.classList.remove('btn-success'));
            this.classList.add('btn-success');
            seatInput.value = this.getAttribute('data-seat');
        });
    });
</script>
@endsection
