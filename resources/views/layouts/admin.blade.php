<!DOCTYPE html>
<html lang="en">

<head>
    @include("components.admin.header")
    @yield("page-title")
    @livewireStyles
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="d-none d-md-block col-md-4 col-lg-3 bg-dark">
                <div style="position:sticky; top:0px; height:100vh;">
                    @include('components.admin.side-panel')
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                @include("components.admin.navbar")
                @yield("content")
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Dashboard</h5>
            <button type="button" class="bg-light btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div x-data="{ open: 0 }">
                <div class="ms-2">
                    <p type="button" class="m-0 text-dark fw-500" @click="open = 1">
                        <span>Student</span>
                        <svg x-show="open != 1" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="black" />
                        </svg>
                        <svg x-cloak x-show="open == 1" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="black" />
                        </svg>
                    </p>
                    <div x-cloak x-show="open == 1">
                        <a href="{{ env('APP_URL') }}/admin/dashboard/manage-student"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Manage
                            Student</a>
                        <a href="{{ env('APP_URL') }}/admin/dashboard/manage-student-reports"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Manage
                            Student Report</a>
                    </div>
                </div>
                <div class="ms-2 mt-4">
                    <p type="button" class="m-0 text-dark fw-500" @click="open = 2">
                        <span>Blog</span>
                        <svg x-show="open != 2" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="black" />
                        </svg>
                        <svg x-cloak x-show="open == 2" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="black" />
                        </svg>
                    </p>
                    <div x-cloak x-show="open == 2">
                        <a href="{{ env('APP_URL') }}/admin/dashboard/add-blog"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Add
                            New Post</a>
                        <a href="{{ env('APP_URL') }}/admin/dashboard/manage-blog"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Manage
                            Post</a>
                    </div>
                </div>
                <div class="ms-2 mt-4">
                    <p type="button" class="m-0 text-dark fw-500" @click="open = 3">
                        <span>Notes</span>
                        <svg x-show="open != 3" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="black" />
                        </svg>
                        <svg x-cloak x-show="open == 3" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="black" />
                        </svg>
                    </p>
                    <div x-cloak x-show="open == 3">
                        <a href="{{ env('APP_URL') }}/admin/dashboard/add-note"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Add Notes</a>
                        <a href="{{ env('APP_URL') }}/admin/dashboard/manage-note"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Manage Notes</a>
                    </div>
                </div>
                <div class="ms-2 mt-4">
                    <p type="button" class="m-0 text-dark fw-500" @click="open = 4">
                        <span>Chapter Videos</span>
                        <svg x-show="open != 4" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="black" />
                        </svg>
                        <svg x-cloak x-show="open == 4" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="black" />
                        </svg>
                    </p>
                    <div x-cloak x-show="open == 4">
                        <a href="{{ env('APP_URL') }}/admin/dashboard/add-videos"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Add
                            Chapter Videos</a>
                        <a href="{{ env('APP_URL') }}/admin/dashboard/manage-videos"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Manage
                            Chapter Videos</a>
                    </div>
                </div>
                <div class="ms-2 mt-4">
                    <p type="button" class="m-0 text-dark fw-500" @click="open = 5">
                        <span>Quiz</span>
                        <svg x-show="open != 5" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="black" />
                        </svg>
                        <svg x-cloak x-show="open == 5" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="black" />
                        </svg>
                    </p>
                    <div x-cloak x-show="open == 5">
                        <a href="{{ env('APP_URL') }}/admin/dashboard/add-mcq"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Add
                            Mcq Questions</a>
                        <a href="{{ env('APP_URL') }}/admin/dashboard/manage-mcq"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Manage
                            Mcq Questions</a>
                    </div>
                </div>
                <div class="ms-2 mt-4">
                    <p type="button" class="m-0 text-dark fw-500" @click="open = 6">
                        <span>Settings</span>
                        <svg x-show="open != 6" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="black" />
                        </svg>
                        <svg x-cloak x-show="open == 6" width="12" height="8" viewBox="0 0 12 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="black" />
                        </svg>
                    </p>
                    <div x-cloak x-show="open == 6">
                        <a href="{{ env('APP_URL') }}/admin/dashboard/website-settings"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Website
                            Settings</a>
                        <a href="{{ env('APP_URL') }}/admin/dashboard/profile-settings"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Profile
                            Settings</a>
                        <a href="{{ env('APP_URL') }}/admin/dashboard/change-password"
                            class="d-block border border-2 border-dark border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-dark pt-1">Change
                            Password</a>
                    </div>
                </div>
                <div class="ms-2 mt-4">
                    <a class="m-0 text-dark fw-500 text-decoration-none"
                        href="{{ env('APP_URL') }}/admin/dashboard/manage-contact">Manage Contacts</a>
                </div>
            </div>

        </div>
    </div>

    @include("components.admin.footer")

    @livewireScripts
    <script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield("script")
</body>

</html>
