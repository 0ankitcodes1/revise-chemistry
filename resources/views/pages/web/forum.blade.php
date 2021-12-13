@extends('layouts.web')
@section('page-title')
    <title>Forum</title>
@stop
@section('content')
    @php
        if($_COOKIE['student_token']) {
            $student_token = $_COOKIE['student_token'];
        }
        else {
            $student_token = 'token-not-set';
        }
    @endphp
    <!-- BREADCRUMB -->
    <section class="bg-light">
        <div class="container pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                            class="text-decoration-none text-dark fw-500">Home</a></li>
                    <li class="breadcrumb-item fw-500 active" aria-current="page">Forum</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="bg-light pt-4">
        <livewire:forum-widget :token="$student_token" />
        <div class="container text-dark">
            <livewire:forum-view />
        </div>
    </section>
@stop
@section('script')
@stop
