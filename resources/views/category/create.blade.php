<x-form-layout title="Create Category">
    <form class="form form-vertical" action="{{ route('categories.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-body">
            @include('category.field')
        </div>
    </form>
</x-form-layout>