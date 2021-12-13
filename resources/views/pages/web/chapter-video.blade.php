@extends('layouts.web')

@section('page-title')
    <title>chapter Video</title>
@stop

@section('content')
    @php
    $id = request()->id;
    $getChapterForId = \App\Models\Note::where('id', $id)
        ->pluck('chapter')
        ->first();
    $getAppVideo = \App\Models\ChapterVideo::where('chapter', $getChapterForId)->get();
    @endphp
    <!-- Blog Content -->
    <section class="bg-light">
        <!-- BREADCRUMB -->
        <section>
            <div class="container pt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                                class="text-decoration-none text-dark fw-500">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}/video"
                                class="text-decoration-none text-dark fw-500">Video</a></li>
                        <li class="breadcrumb-item fw-500 active" aria-current="page">{{ $getChapterForId }}</li>
                    </ol>
                </nav>
            </div>
        </section>

        @if (count($getAppVideo) <= 0)
        <section class="container mt-5">
            <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0" style="min-height:300px;">
                <h3 class="m-0 p-4 text-dark">No Video Added For this Chapter</h3>
            </div>
        </section>
        @else
        <section class="container">
            <div class="row">
                @foreach ($getAppVideo as $post)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-4">
                        <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <video width="100%" controls>
                                        <source src="{{ $post['videoUrl'] }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                      </video>
                                </div>
                                <div class="col-12">
                                    <div class="card-body p-0 p-2">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0 fs-10 fw-500 text-dark">
                                                    {{ \Carbon\Carbon::parse($post['created_at'])->format('d M Y')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        @endif
    </section>

@stop

@section('script')
@stop
