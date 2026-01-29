<x-index-layout title="User">
    <x-slot name="breadcrumb">
        <x-breadcrumb currentPage="User" />
    </x-slot>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.export') }}" class="btn btn-outline-success">
                <i class="fa-solid fa-download me-2"></i>
                <span>Export</span>
            </a>
        </div>
        <div class="card-body">
            @session('success')
            <x-alert type="success" dismissible="true" icon="bi bi-check-circle">
                {{ session('success') }}
            </x-alert>
            @endsession
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->status == 1)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <div class="p-4 text-center">No data available</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
</x-index-layout>