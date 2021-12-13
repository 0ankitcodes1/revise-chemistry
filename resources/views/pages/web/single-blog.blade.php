@extends('layouts.web')

@section('page-title')
    <title>ReviseChemistry : Chemistry For IGCSE, IB & Beyond. We make revision easy for you.</title>
@stop

@section('content')
    <!-- Blog Content -->
    <section class="bg-light">
        <!-- BREADCRUMB -->
        <section id="breadcrumb">

        </section>
        <section>
            <div id="single-blog-post-body" class="container">

            </div>
        </section>
        <!-- Related BLOG POSTS -->
        <section>
            <div class="container">
                <h3 class="fs-30 text-dark fw-600 m-0 mt-5">Related Blog Post</h3>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-4">
                        <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <img class="card-img-top rounded-0 w-100 h-100"
                                        src="https://picsum.photos/id/201/300/200" alt="blog thumbnail" />
                                </div>
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body p-0 p-2">
                                        <h3 class="fw-600 fs-25 text-dark text-ellipsis w-100 m-0">Blog title</h3>
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0 fs-10 fw-500 text-dark">25 JUN 2020</p>
                                            </div>
                                            <div>
                                                <a href="{{ env('APP_URL') }}/blog/category"
                                                    class="btn btn-sm btn-secondary rounded-0 p-0 px-2 mb-2">category</a>
                                            </div>
                                        </div>
                                        <p class="fw-500 fs-15 text-dark text-ellipsis w-100 m-0">Lorem ipsum dolor, sit
                                            amet
                                            consectetur adipisicing elit. Totam, ex quia. Quo quae, alias pariatur eveniet
                                            ullam
                                            distinctio ea! Quidem voluptate corrupti ipsa doloremque, perspiciatis at maxime
                                            veritatis est voluptatum!</p>
                                        <a href="#" class="btn mt-1 btn-sm rounded-0 btn-outline-primary"
                                            alt="read more">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-4">
                        <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0">
                            <div class="row">
                                <div class="col-6 col-lg-12">
                                    <img class="card-img-top rounded-0 w-100 h-100"
                                        src="https://picsum.photos/id/201/300/200" alt="blog thumbnail" />
                                </div>
                                <div class="col-6 col-lg-12">
                                    <div class="card-body p-0 p-2">
                                        <h3 class="fw-600 fs-25 text-dark text-ellipsis w-100 mb-0">Blog title</h3>
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0 fs-10 fw-500 text-dark">25 JUN 2020</p>
                                            </div>
                                            <div>
                                                <a href="{{ env('APP_URL') }}/blog/category"
                                                    class="btn btn-sm btn-secondary rounded-0 p-0 px-2 mb-2">category</a>
                                            </div>
                                        </div>
                                        <p class="fw-500 fs-15 text-dark text-ellipsis w-100 m-0">Lorem ipsum dolor, sit
                                            amet
                                            consectetur adipisicing elit. Totam, ex quia. Quo quae, alias pariatur eveniet
                                            ullam
                                            distinctio ea! Quidem voluptate corrupti ipsa doloremque, perspiciatis at maxime
                                            veritatis est voluptatum!</p>
                                        <a href="#" class="btn mt-1 btn-sm rounded-0 btn-outline-primary"
                                            alt="read more">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-4">
                        <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0">
                            <div class="row">
                                <div class="col-6 col-lg-12">
                                    <img class="card-img-top rounded-0 w-100 h-100"
                                        src="https://picsum.photos/id/201/300/200" alt="blog thumbnail" />
                                </div>
                                <div class="col-6 col-lg-12">
                                    <div class="card-body p-0 p-2">
                                        <h3 class="fw-600 fs-25 text-dark text-ellipsis w-100 mb-0">Blog title</h3>
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0 fs-10 fw-500 text-dark">25 JUN 2020</p>
                                            </div>
                                            <div>
                                                <a href="{{ env('APP_URL') }}/blog/category"
                                                    class="btn btn-sm btn-secondary rounded-0 p-0 px-2 mb-2">category</a>
                                            </div>
                                        </div>
                                        <p class="fw-500 fs-15 text-dark text-ellipsis w-100 m-0">Lorem ipsum dolor, sit
                                            amet
                                            consectetur adipisicing elit. Totam, ex quia. Quo quae, alias pariatur eveniet
                                            ullam
                                            distinctio ea! Quidem voluptate corrupti ipsa doloremque, perspiciatis at maxime
                                            veritatis est voluptatum!</p>
                                        <a href="#" class="btn mt-1 btn-sm rounded-0 btn-outline-primary"
                                            alt="read more">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop

@section('script')
@stop
