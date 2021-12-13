@extends('layouts.web')

@section('page-title')
    <title>Blog Page</title>
@stop

@section('content')
    @php
    $getUrl = $_SERVER['REQUEST_URI'];
    $getCategory = explode('/blog/', $getUrl)[1];
    if (strlen($getCategory) > 0) {
        $getCategory = str_replace('%20', ' ', $getCategory);
        $posts = \App\Models\Blog::where('category', $getCategory)
            ->OrderByDesc('created_at')
            ->get();
    } else {
        $posts = 'nothing';
    }
    @endphp
    <!-- BREADCRUMB -->
    <section class="bg-light">
        <div class="container pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                            class="text-decoration-none text-dark fw-500">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}/blog"
                            class="text-decoration-none text-dark fw-500">Blog</a></li>
                    <li class="breadcrumb-item fw-500 active" aria-current="page">{{ $getCategory }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- NOTE CATEGORY -->
    <section class="bg-light pt-3">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-4">
                        <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <img class="card-img-top rounded-0 w-100 h-100" src="{{ $post['thumbnail'] }}"
                                        alt="blog thumbnail" />
                                </div>
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body p-0 p-2">
                                        <h3 class="fw-600 fs-25 text-dark text-ellipsis w-100 m-0">{{ $post['title'] }}
                                        </h3>
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0 fs-10 fw-500 text-dark">
                                                    {{ \Carbon\Carbon::parse($post['created_at'])->format('d M Y') }}
                                                </p>
                                            </div>
                                            <div>
                                                <a href="{{ env('APP_URL') }}/blog/{{ $post['category'] }}"
                                                    class="btn btn-sm btn-secondary rounded-0 p-0 px-2 mb-2">{{ $post['category'] }}</a>
                                            </div>
                                        </div>
                                        <p class="fw-500 fs-15 text-dark text-ellipsis w-100 m-0">
                                            {{ $post['description'] }}
                                        </p>
                                        <a href="{{ env('APP_URL') }}/blog/category/{{ $post['id'] }}"
                                            class="btn mt-1 btn-sm rounded-0 btn-outline-primary" alt="read more">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
