<div class="container">
    <div class="row">
        <div class="col-12 col-sm-4 col-lg-3 col-xl-3 my-2">
            <a class="card rounded-0 text-decoration-none text-dark"
                href="{{ env('APP_URL') }}/admin/dashboard/manage-student">
                <div class="card-body border border-4 border-top-0 border-bottom-0 border-end-0 rounded-0">
                    <h3 class="m-0">Students</h3>
                    <h2 class="m-0 mt-2 fw-700">
                        {{ \App\Models\Student::count() }}
                    </h2>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3 col-xl-3 my-2">
            <a class="card rounded-0 text-decoration-none text-dark"
                href="{{ env('APP_URL') }}/admin/dashboard/manage-blog">
                <div class="card-body border border-4 border-top-0 border-bottom-0 border-end-0 rounded-0">
                    <h3 class="m-0">Blog</h3>
                    <h2 class="m-0 mt-2 fw-700">
                        {{ \App\Models\Blog::count() }}
                    </h2>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3 col-xl-3 my-2">
            <a class="card rounded-0 text-decoration-none text-dark"
                href="{{ env('APP_URL') }}/admin/dashboard/manage-video">
                <div class="card-body border border-4 border-top-0 border-bottom-0 border-end-0 rounded-0">
                    <h3 class="m-0">Videos</h3>
                    <h2 class="m-0 mt-2 fw-700">
                        {{ \App\Models\ChapterVideo::count() }}
                    </h2>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3 col-xl-3 my-2">
            <a class="card rounded-0 text-decoration-none text-dark"
                href="{{ env('APP_URL') }}/admin/dashboard/manage-notes">
                <div class="card-body border border-4 border-top-0 border-bottom-0 border-end-0 rounded-0">
                    <h3 class="m-0">Note</h3>
                    <h2 class="m-0 mt-2 fw-700">
                        {{ \App\Models\Note::count() }}
                    </h2>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3 col-xl-3 my-2">
            <a class="card rounded-0 text-decoration-none text-dark"
                href="{{ env('APP_URL') }}/admin/dashboard/manage-mcq">
                <div class="card-body border border-4 border-top-0 border-bottom-0 border-end-0 rounded-0">
                    <h3 class="m-0">Quiz</h3>
                    <h2 class="m-0 mt-2 fw-700">
                        {{ \App\Models\Quiz::count() }}
                    </h2>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3 col-xl-3 my-2">
            <a class="card rounded-0 text-decoration-none text-dark"
                href="{{ env('APP_URL') }}/admin/dashboard/manage-student-reports">
                <div class="card-body border border-4 border-top-0 border-bottom-0 border-end-0 rounded-0">
                    <h3 class="m-0">Reports</h3>
                    <h2 class="m-0 mt-2 fw-700">
                        {{ \App\Models\StudentReport::count() }}
                    </h2>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3 col-xl-3 my-2">
            <a class="card rounded-0 text-decoration-none text-dark"
                href="{{ env('APP_URL') }}/admin/dashboard/manage-contact">
                <div class="card-body border border-4 border-top-0 border-bottom-0 border-end-0 rounded-0">
                    <h3 class="m-0">Contact Inquiries</h3>
                    <h2 class="m-0 mt-2 fw-700">
                        {{ \App\Models\Contact::count() }}
                    </h2>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3 col-xl-3 my-2">
            <a class="card rounded-0 text-decoration-none text-dark"
                href="{{ env('APP_URL') }}/admin/dashboard/website-settings">
                <div class="card-body border border-4 border-top-0 border-bottom-0 border-end-0 rounded-0">
                    <h3 class="m-0">Website Settings</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-4 col-lg-3 col-xl-3 my-2">
            <a class="card rounded-0 text-decoration-none text-dark"
                href="{{ env('APP_URL') }}/admin/dashboard/profile-settings">
                <div class="card-body border border-4 border-top-0 border-bottom-0 border-end-0 rounded-0">
                    <h3 class="m-0">Profile Settings</h3>
                </div>
            </a>
        </div>
    </div>
    <hr class="my-5">
    <div>
        <h3 class="mb-4">Video Tutorial For Admin Panel</h3>
        <!-- lets just provide youtube link here -->
        <a href="#" class="btn btn-primary">Watch Video Tutorial</a>
    </div>
</div>
