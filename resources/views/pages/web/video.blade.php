@extends('layouts.web')

@section('page-title')
    <title>ReviseChemistry : Chemistry For IGCSE, IB & Beyond. We make revision easy for you.</title>
@stop

@section('content')
    <!-- Blog Content -->
    <section class="bg-light">
        <!-- BREADCRUMB -->
        <section>
            <div class="container pt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                                class="text-decoration-none text-dark fw-500">Home</a></li>
                        <li class="breadcrumb-item fw-500 active" aria-current="page">Video</li>
                    </ol>
                </nav>
            </div>
        </section>
        <!-- BLOG POSTS -->
        <section>
            <div class="container">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-4">
                            <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0">
                                <div class="row">
                                    <div class="col-12">
                                        <video width="100%" controls>
                                            <source src="{{ $post['videoUrl'] }}" type="{{ $post['mediaType'] }}">
                                            Your browser does not support the video tag.
                                          </video>
                                    </div>
                                    <div class="col-12">
                                        <div class="card-body p-0 p-2">
                                            <div class="d-flex w-100 justify-content-between align-items-center">
                                                <div>
                                                    <div class="mb-1">
                                                        <p class="m-0 fs-10 fw-500 text-dark mb-2">
                                                            {{ \Carbon\Carbon::parse($post['created_at'])->format('d M Y')}}
                                                        </p>
                                                        <a href="{{ env('APP_URL') }}/note/{{ $post->category }}" class="badge bg-primary">{{ $post->category }}</a>
                                                        @php
                                                            $getChapter = \App\Models\ChapterVideo::where('id', $post->id)->pluck('chapter')->first();
                                                            $getIdFromNote = \App\Models\Note::where('chapter', $getChapter)->pluck('id')->first();
                                                        @endphp
                                                        @if (strlen($getIdFromNote) > 0)
                                                        <a href="{{ env('APP_URL') }}/note/category/{{ $getIdFromNote }}" class="badge bg-primary">Concept Summery</a>
                                                        <a href="{{ env('APP_URL') }}/quiz/category/{{ $getIdFromNote }}" class="badge bg-primary">Mcq</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

            <!-- PAGINATION -->
        {{ $posts->links('components.web.pagination') }}
    </section>

@stop

@section('script')
@stop
