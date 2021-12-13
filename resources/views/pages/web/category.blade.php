@extends('layouts.web')

@section('page-title')
    <title>Note Page</title>
@stop

@section('content')
    <!-- BREADCRUMB -->
    <section class="bg-light">
        <div class="container pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                            class="text-decoration-none text-dark fw-500">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                            class="text-decoration-none text-dark fw-500">Note</a></li>
                    <li class="breadcrumb-item fw-500 active" aria-current="page">Category</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- NOTE CATEGORY -->
    <section class="bg-light pt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4 mt-3">
                    <div class="card rounded-0 bg-light border border-style-dashed border-3">
                        <div class="card-body">
                            <a href="{{ env('APP_URL') }}/note/category/ch-1" class="text-decoration-none fw-600 fs-20 text-dark">Chapter 1 just a dummy one</a>

                            <div class="mt-1">
                                <a href="{{ env('APP_URL') }}/note/category" class="btn btn-outline-secondary btn-sm rounded-0">Physics</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 mt-3">
                    <div class="card rounded-0 bg-light border border-style-dashed border-3">
                        <div class="card-body">
                            <a href="{{ env('APP_URL') }}/note/category/ch-1" class="text-decoration-none fw-600 fs-20 text-dark">Chapter 1 just a dummy one</a>

                            <div class="mt-1">
                                <a href="{{ env('APP_URL') }}/note/category" class="btn btn-outline-secondary btn-sm rounded-0">Physics</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 mt-3">
                    <div class="card rounded-0 bg-light border border-style-dashed border-3">
                        <div class="card-body">
                            <a href="{{ env('APP_URL') }}/note/category/ch-1" class="text-decoration-none fw-600 fs-20 text-dark">Chapter 1 just a dummy one</a>

                            <div class="mt-1">
                                <a href="{{ env('APP_URL') }}/note/category" class="btn btn-outline-secondary btn-sm rounded-0">Physics</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 mt-3">
                    <div class="card rounded-0 bg-light border border-style-dashed border-3">
                        <div class="card-body">
                            <a href="{{ env('APP_URL') }}/note/category/ch-1" class="text-decoration-none fw-600 fs-20 text-dark">Chapter 1 just a dummy one</a>

                            <div class="mt-1">
                                <a href="{{ env('APP_URL') }}/note/category" class="btn btn-outline-secondary btn-sm rounded-0">Physics</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 mt-3">
                    <div class="card rounded-0 bg-light border border-style-dashed border-3">
                        <div class="card-body">
                            <a href="{{ env('APP_URL') }}/note/category/ch-1" class="text-decoration-none fw-600 fs-20 text-dark">Chapter 1 just a dummy one</a>

                            <div class="mt-1">
                                <a href="{{ env('APP_URL') }}/note/category" class="btn btn-outline-secondary btn-sm rounded-0">Physics</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
@stop
