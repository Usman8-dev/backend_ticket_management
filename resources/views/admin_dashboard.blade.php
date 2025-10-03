@extends('layout.adminPanal')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
       
        <!-- Tab Content -->
        <div class="col-md-29">
            <div class="tab-content">
                <!-- Customers Tab -->
                <div class="tab-pane fade show active" id="customers">
                    <h3>Customer Management</h3>
                    
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Current Role</th>
                                <th>Change Role</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if (auth()->user()->id !== $user->id)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.updateRole', $user->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="role" class="form-select" onchange="this.form.submit()">
                                                    <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
                                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Add more tab content here -->
            </div>
        </div>
    </div>
</div>
@endsection



