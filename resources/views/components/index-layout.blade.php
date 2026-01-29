@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title ?? 'Titlte' }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    
                </div>
            </div>
        </div>
        <section class="section">
            {{ $slot }}
        </section>
    </div>
@endsection
