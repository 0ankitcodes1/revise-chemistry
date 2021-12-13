@extends('layouts.web')

@section('page-title')
    <title>ReviseChemistry : Chemistry For IGCSE, IB & Beyond. We make revision easy for you.</title>
@stop

@section('content')
    <!-- HERO SECTION -->
    <section class="pt-5 pb-5 border"
        style="background: linear-gradient(360deg, rgba(66,4,189,1) 0%, rgba(132,8,148,1) 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-11 mt-5 bg-transparent">
                    <div id="quotes" class="glide">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides m-0">
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        Persistence refines the miserable piece of carbon in you into the purest form of
                                        Diamond
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ Tobi Delly</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        Have the courage to follow your heart and intuition. They somehow know what you
                                        truly want to become
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ Steve Jobs</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        A winner is a dreamer who never gives up
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ Nelson Mandela</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        If you want to shine like a sun, first burn like the Sun
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ Dr. APJ Abdul Kalam</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        All the world is a laboratory to the inquiring mind
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ Martin H. Fischer</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        Make each day your master piece
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ John Wooden</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        Life is a chemical reaction, it only requires balancing
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ Priyavrat Gupta</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        All your dreams can come true if you have the courage to pursue them
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ Walt Disney</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        If love is the engine, intellect is the ignition, then chemistry is the spark
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ Kate Mc Gahan</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        Dream it. Wish it. Do it.
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                                <li class="glide__slide border border-2 border-style-dashed p-4">
                                    <h2 class="fs-30 fw-600 text-white position-relative">
                                        I believe that the Science of Chemistry alone almost proves the existence of an
                                        intelligent creator
                                        <svg class="position-absolute" width="20" height="20" viewBox="0 0 14 10"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 10H4L6 6V0H0V6H3L1 10ZM9 10H12L14 6V0H8V6H11L9 10Z" fill="#fff" />
                                        </svg>
                                    </h2>
                                    <p class="m-0 mt-3 fw-600 fs-20 text-danger">➡ Thomas A. Edison</p>
                                    <a href="{{ env('APP_URL') }}/note"
                                        class="btn border border-1 border-style-white rounded-0 text-white border-1 fw-400 fs-20 mt-4">Get
                                        Started</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT US -->
    <section class="bg-light py-4">
        <div class="container">
            <div class="card bg-light border-0">
                <div class="row align-items-center">
                    <div class="col-5 col-lg-4">
                        <div class="card-body m-0 p-0 pt-3 px-2">
                            <video width="100%" height="240" controls>
                                <source src="{{ \App\Models\WebsiteInfo::where('id', 13)->first()->value }}" type="{{ \App\Models\WebsiteInfo::where('id', 13)->first()->by }}">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card-body bg-light">
                            <h3 class="fs-30 m-0 mb-3 fw-700 text-danger">ABOUT US</h3>
                            <div>
                                {!! \App\Models\WebsiteInfo::where('id', 7)->first()->value !!}
                            </div>
                            <a class="btn btn-lg custom-bg-purple text-white mt-4"
                                href="{{ env('APP_URL') }}/contact-us">Book a FREE class</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MOTIVATION AND VISION -->
    <section class="bg-light pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mt-5">
                    <div class="card bg-light rounded-0 border-3 border-style-dashed">
                        <div class="card-body">
                            <h3 class="fs-30 m-0 mb-3 fw-700 text-danger">Our Vision</h3>
                            <div>
                                {!! \App\Models\WebsiteInfo::where('id', 14)->first()->value !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-5">
                    <div class="card bg-light rounded-0 border-3 border-style-dashed">
                        <div class="card-body">
                            <h3 class="text-danger fs-30 m-0 mb-3 fw-700">What we offer</h3>
                            <div>
                                {!! \App\Models\WebsiteInfo::where('id', 9)->first()->value !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <div class="card bg-light rounded-0 border-3 border-style-dashed">
                        <div class="card-body">
                            <h3 class="text-danger fs-30 m-0 mb-3 fw-700">Why choose us</h3>
                            <div>
                                {!! \App\Models\WebsiteInfo::where('id', 8)->first()->value !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BLOG SECTION -->
    <section class="bg-light py-4">
        <div class="container">
            <h2 class="fw-700 fs-30 text-danger mb-3">Latest Blog Post</h2>
            <div id="latest-blog-post" class="row">
            </div>
            <a href="{{ env('APP_URL') }}/blog" class="mt-4 btn btn-outline-primary rounded-0">More . . .</a>
        </div>
    </section>
@stop

@section('script')
@stop
