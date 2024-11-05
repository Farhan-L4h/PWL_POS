@extends('layout.app')

@section('subtitle', 'Admin')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Login Sebagai</h1>
            <p>
                Tampilan {{ Auth::user()->level->id == 1 ? 'Admin' : 'Manager' }}
            </p>
            <p>
                {{ Auth::user()->level_id == 1 ? 'Admin' : 'Manager' }}
            </p>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush
