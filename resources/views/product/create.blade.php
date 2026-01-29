<x-form-layout title="Create Product">
    <form class="form form-vertical" action="{{ route('products.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-body">
            @include('product.field')
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-body">
                    @include('product.field')
                </div>
            </div>
        </div>
    </form>
</x-form-layout>