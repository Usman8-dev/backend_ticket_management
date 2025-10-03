@extends('layout.adminPanal')

 @section('content')
 <div class="container">
     <h3>Trips</h3>
 
     <!-- Add Trip Button -->
     <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTripModal">Add Trip</button>
 
     <!-- Trips Table -->
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>Route</th>
                 <th>Bus Number</th>
                 <th>Departure</th>
                 <th>Arrival</th>
                 <th>Date</th>
                 <th>Price</th>
                 <th>Actions</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($trips as $trip)
                 <tr>
                     <td>{{ $trip->route }}</td>
                     <td>{{ $trip->bus->bus_number }}</td>
                     <td>{{ $trip->departure_time }}</td>
                     <td>{{ $trip->arrival_time }}</td>
                     <td>{{ $trip->date }}</td>
                     <td>{{ $trip->price }}</td>
                     <td>
                         
                         {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTripModal{{ $trip->id }}">
                            Edit
                        </button> --}}
                        <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-primary">
                            Edit
                        </a>
                                                
                         <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" class="d-inline">
                             @csrf @method('DELETE')
                             <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                         </form>
                     </td>
                 </tr>

             @endforeach
         </tbody>
     </table>
 </div>
 
 <!-- Add Trip Modal -->
 <div class="modal fade" id="addTripModal" tabindex="-1">
     <div class="modal-dialog">
         <form method="POST" action="{{ route('trips.store') }}" class="modal-content">
             @csrf
             <div class="modal-header">
                 <h5>Add Trip</h5>
                 <button class="btn-close" data-bs-dismiss="modal"></button>
             </div>
             <div class="modal-body">
                 <div class="mb-3">
                     <label>Route</label>
                     <input name="route" class="form-control" required>
                 </div>
                 <div class="mb-3">
                     <label>Bus</label>
                     <select name="bus_id" class="form-select" required>
                         @foreach($buses as $bus)
                             <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="mb-3">
                     <label>Departure Time</label>
                     <input type="time" name="departure_time" class="form-control" required>
                 </div>
                 <div class="mb-3">
                     <label>Arrival Time</label>
                     <input type="time" name="arrival_time" class="form-control" required>
                 </div>
           
                 <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" id="date" required>
                </div>
                
                 <div class="mb-3">
                     <label>Price</label>
                     <input type="number" name="price" step="0.01" class="form-control" required>
                 </div>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-primary">Add Trip</button>
             </div>
         </form>
     </div>
 </div>
 @endsection
 