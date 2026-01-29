@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
@endsection