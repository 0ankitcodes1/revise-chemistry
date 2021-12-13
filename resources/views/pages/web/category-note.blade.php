@extends('layouts.web')

@section('page-title')
    <title>Blog Page</title>
@stop

@section('content')
    @php
    $getUrl = $_SERVER['REQUEST_URI'];
    $getCategory = explode('/note/', $getUrl)[1];
    if (strlen($getCategory) > 0) {
        $getCategory = str_replace('%20', ' ', $getCategory);
        $getAllNotes = \App\Models\Note::where('category', $getCategory)
            ->OrderByDesc('created_at')
            ->get();
    } else {
        $getCategory = 'nothing';
    }
    @endphp

    {{-- {{ $getAllNotes }} --}}
    <!-- BREADCRUMB -->
    <section id="breadcrumb" class="bg-light">
        <div class="container pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                            class="text-decoration-none text-dark fw-500">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}/note"
                            class="text-decoration-none text-dark fw-500">Note</a></li>
                    <li class="breadcrumb-item fw-500 active" aria-current="page">{{ $getCategory }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- NOTE CATEGORY -->
    <section class="bg-light pt-3">
        <div class="container">
            <div class="row">
                @foreach ($getAllNotes as $note)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
                        <div class="card rounded-0 bg-light border border-style-dashed border-3">
                            <div class="card-body">
                                <h3 class="text-dark fs-20">{{ $note->chapter }}</h3>
                                <div class="mb-3">
                                    <a href="{{ env('APP_URL') }}/quiz/category/{{ $note->id }}"
                                        class="badge bg-primary">Mcq Questions</a>
                                    <a href="{{ env('APP_URL') }}/video/category/{{ $note->id }}"
                                        class="badge bg-primary">Videos</a>
                                </div>
                                <a href="{{ env('APP_URL') }}/note/category/{{ $note->id }}"
                                    class="btn btn-outline-dark rounded-0 btn-sm">Read Chapter</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
