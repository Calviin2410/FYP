<x-form-layout title="Edit Product">
    <form class="form form-vertical" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-body">
            @include('product.field')
        </div>
    </form>
</x-form-layout>