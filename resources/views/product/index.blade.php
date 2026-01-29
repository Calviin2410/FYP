<x-index-layout title="Products">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                <span>New</span>
            </a>
            <a href="{{ route('products.export') }}" class="btn btn-outline-success">
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
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img class="img-fluid" style="width: 100px" src="{{ asset($product->image) }}" alt="" />
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @if($product->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                <button onclick="confirmDelete({{ $product->id }})" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
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
                        url: `/products/${id}/delete`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Product has been deleted.",
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