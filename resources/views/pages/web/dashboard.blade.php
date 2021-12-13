@php
if (isset($_COOKIE['student_token'])) {
    $user = \App\Models\Student::where('token', $_COOKIE['student_token']);
    if (!$user->exists()) {
        header('Location:' . env('APP_URL') . '/login');
        exit();
    }
    else {
        $userid = $user->first()->id;
    }
} else {
    header('Location:' . env('APP_URL') . '/login');
    exit();
}
@endphp
@extends('layouts.web')

@section('page-title')
    <title>Login Page</title>
@stop

@section('content')
    <!-- BREADCRUMB -->
    <section class="bg-light">
        <div class="container pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                            class="text-decoration-none text-dark fw-500">Home</a></li>
                    <li class="breadcrumb-item fw-500 active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 mt-4">
                    <nav id="navbar-example3"
                        class="navbar navbar-light bg-light flex-column align-items-stretch sticky-top p-0">
                        <a class="navbar-brand fs-20 fw-600 text-dark" href="{{ env('APP_URL') }}/dashboard">Dashboard</a>
                        <nav class="nav nav-pills flex-column">
                            <a class="nav-link fs-15 p-1" href="#item-1">MCQ Result</a>
                            <a class="nav-link fs-15 p-1" href="#item-2">Edit Details</a>
                            <a class="nav-link fs-15 p-1" href="#item-3">Change Password</a>
                        </nav>
                    </nav>
                </div>
                <div class="col-12 col-md-9 mt-4">
                    <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-offset="600" tabindex="0">
                        <h4 id="item-1" class="mt-5"></h4>
                            <livewire:mcq-report-livewire-component :userrole=1 :userid=$userid />
                        <div id="item-2" class="mt-5"></div>
                        <div class="row mt-3">
                            <livewire:edit-personal-details-livewire-component :userid=$userid :userrole=1 />
                        </div>
                        <div id="item-3" class="mt-5"></div>
                        <div class="row mt-3">
                            <livewire:change-password-livewire-component :userid=$userid :userrole=1 />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
