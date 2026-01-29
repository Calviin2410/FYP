<x-form-layout title="Create User">
    <form class="form form-vertical" action="{{ route('users.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-body">
            @include('user.field')
        </div>
    </form>
</x-form-layout>