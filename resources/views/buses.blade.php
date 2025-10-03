@extends('layout.adminPanal')

@section('title', 'Bus Management')

@section('content')

<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Manage Buses</h4>
        <!-- Add Bus Button (opens modal) -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBusModal">+ Add Bus</button>
    </div>

    <!-- Bus Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Bus Number</th>
                <th>Capacity</th>
                <th>Type</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buses as $bus)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bus->bus_number }}</td>
                <td>{{ $bus->capacity }}</td>
                <td>{{ ucfirst($bus->type) }}</td>
                <td class="text-center">
                    <!-- Edit -->
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editBusModal{{ $bus->id }}">
                        <i class="bi bi-pencil"></i>
                    </button>

                    <!-- Delete -->
                    <form action="{{ route('admin.buses.destroy', $bus->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>

            
            <!-- Edit Bus Modal -->
                    <div class="modal fade" id="editBusModal{{ $bus->id }}" tabindex="-1" aria-labelledby="editBusModalLabel{{ $bus->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.buses.update', $bus->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editBusModalLabel{{ $bus->id }}">Edit Bus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Bus Number</label>
                                            <input type="number" name="bus_number" value="{{ $bus->bus_number }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Capacity</label>
                                            <input type="number" name="capacity" value="{{ $bus->capacity }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Type</label>
                                            <select name="type" class="form-select" required>
                                                <option value="Standard" {{ $bus->type == 'Standard' ? 'selected' : '' }}>Standard</option>
                                                <option value="Luxury" {{ $bus->type == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Bus Modal -->
<div class="modal fade" id="addBusModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.buses.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add New Bus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Bus Number</label>
                    <input type="number" name="bus_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Capacity</label>
                    <input type="number" name="capacity" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Type</label>
                    <select name="type" class="form-select" required>
                        <option value="Standard">Standard</option>
                        <option value="Luxury">Luxury</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Add Bus</button>
            </div>
        </form>
    </div>
</div>
@endsection
