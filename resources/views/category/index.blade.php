<x-index-layout title="Category">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i>
                <span>New</span>
            </a>
            <a href="{{ route('categories.export') }}" class="btn btn-outline-success">
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>
                                <img class="img-fluid" style="width: 100px" src="{{ asset($category->image) }}" alt="" />
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <button onclick="confirmDelete({{ $category->id }})" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="p-4 text-center">No data available</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
<script>
    function confirmDelete(id)
    {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/categories/${id}/delete`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Category has been deleted.",
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    }
                });
            }
        });
    }
</script>
</x-index-layout>