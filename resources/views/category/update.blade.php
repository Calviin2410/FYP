<x-form-layout title="Edit Category">
    <form class="form form-vertical" action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-body">
            @include('category.field')
        </div>
    </form>
</x-form-layout>