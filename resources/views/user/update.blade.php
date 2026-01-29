<x-form-layout title="Edit User">
    <form class="form form-vertical" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-body">
            @include('user.field')
        </div>
    </form>
</x-form-layout>