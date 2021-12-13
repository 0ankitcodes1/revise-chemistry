@extends('layouts.web')

@section('page-title')
    <title>ReviseChemistry : Chemistry For IGCSE, IB & Beyond. We make revision easy for you.</title>
@stop

@section('content')
    <section class="bg-light">
        <div class="container">
            {{-- <button id="breadcrumb" class="btn p-0 mt-4 fw-500 fs-15 rounded-0">Biology ➡ quiz chapter name</button> --}}
            <!-- FIRST QUESTION -->
            <form id="sub-quiz-page-body" class="pt-4">

            </form>
            <!-- MORE OTHER QUESTION -->
            <div class="pt-4">
                <button id="quiz-submit-btn" class="btn btn-dark rounded-0 fs-20 fw-500">Show Results</button>
            </div>
        </div>
    </section>
    <!-- SHOWING RESULT -->
    <section id="quiz-report-card" class="bg-light pt-5">

    </section>
@stop
@section('script')
@stop
