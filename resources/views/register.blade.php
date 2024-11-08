@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
@php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))

@if (config('adminlte.use_route_url', false))
@php($login_url = $login_url ? route($login_url) : '')
@php($register_url = $register_url ? route($register_url) : '')
@else
@php($login_url = $login_url ? url($login_url) : '')
@php($register_url = $register_url ? url($register_url) : '')
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
<form action="{{route('proses_register')}}" method="post">
    @csrf

    <div class="input-group mb-3">
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
            value="{{ old('nama') }}" placeholder="Nama" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @error('nama')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="input-group mb-3">
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
            value="{{ old('username') }}" placeholder="Username" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</form>

<div class="input-group mb-3">
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
        placeholder="{{__('adminlte::adminlte.password')}}">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
        </div>
    </div>
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
    <span class="fas fa-user-plus"></span>
    {{__('adminlte::adminlte.register')}}
</button>
@stop