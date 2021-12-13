@php
if (isset($_COOKIE['admin_token'])) {
    $user = \App\Models\Admin::where('token', $_COOKIE['admin_token']);
    if ($user->exists()) {
        header('Location:' . env('APP_URL') . '/admin/dashboard');
        exit();
    }
}
@endphp
@extends('layouts.auth')

@section('page-title')
    <title>Admin Login Page</title>
@stop

@section('content')
    <div class="mt-2">
        <a href="{{ route('home') }}" class="fs-20 text-decoration-none fw-600 text-dark">revisechemistry</a>
    </div>
    <livewire:login-logic-livewire-component :userrole=0 />
@stop
@section('script')
@stop
