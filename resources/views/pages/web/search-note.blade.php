@extends('layouts.web')

@section('page-title')
    <title>ReviseChemistry : Chemistry For IGCSE, IB & Beyond. We make revision easy for you.</title>
@stop

@section('content')
    <!-- BREADCRUMB -->
    <section class="bg-light">
        <div class="container pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                            class="text-decoration-none text-dark fw-500">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}/note"
                            class="text-decoration-none text-dark fw-500">Note</a></li>
                    <li id="current-tab" class="breadcrumb-item fw-500 active" aria-current="page">Search Result</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- NOTE CATEGORY -->
    <section class="bg-light pt-3">
        <div class="container">
            <div id="note-search-result" class="row">
            </div>
        </div>
    </section>
@stop
