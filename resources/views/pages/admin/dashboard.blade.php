@php
if (isset($_COOKIE['admin_token'])) {
    $user = \App\Models\Admin::where('token', $_COOKIE['admin_token']);
    if (!$user->exists()) {
        header('Location:' . env('APP_URL') . '/admin/login');
        exit();
    }
} else {
    header('Location:' . env('APP_URL') . '/admin/login');
    exit();
}
@endphp
@extends('layouts.admin')
@section('page-title')
    <title>Admin Panel</title>
@stop
@section('content')
    <livewire:status-livewire-component />
@stop
