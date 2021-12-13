<div x-data="{ open: 0 }">
    <h3 class="text-white fs-20 fw-500 pt-4">Dashboard</h3>
    <div class="ms-2 mt-4">
        <p type="button" class="m-0 text-white fw-500" @click="open = 1">
            <span>Student</span>
            <svg x-show="open != 1" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="white" />
            </svg>
            <svg x-cloak x-show="open == 1" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="white" />
            </svg>
        </p>
        <div x-cloak x-show="open == 1" >
            <a href="{{ env('APP_URL') }}/admin/dashboard/manage-student"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Manage
                Student</a>
            <a href="{{ env('APP_URL') }}/admin/dashboard/manage-student-reports"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Manage
                Student Report</a>
        </div>
    </div>
    <div class="ms-2 mt-4">
        <p type="button" class="m-0 text-white fw-500" @click="open = 2">
            <span>Blog</span>
            <svg x-show="open != 2" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="white" />
            </svg>
            <svg x-cloak x-show="open == 2" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="white" />
            </svg>
        </p>
        <div x-cloak x-show="open == 2" >
            <a href="{{ env('APP_URL') }}/admin/dashboard/add-blog"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Add
                New Post</a>
            <a href="{{ env('APP_URL') }}/admin/dashboard/manage-blog"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Manage
                Post</a>
        </div>
    </div>
    <div class="ms-2 mt-4">
        <p type="button" class="m-0 text-white fw-500" @click="open = 3">
            <span>Notes</span>
            <svg x-show="open != 3" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="white" />
            </svg>
            <svg x-cloak x-show="open == 3" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="white" />
            </svg>
        </p>
        <div x-cloak x-show="open == 3" >
            <a href="{{ env('APP_URL') }}/admin/dashboard/add-note"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Add Notes</a>
            <a href="{{ env('APP_URL') }}/admin/dashboard/manage-note"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Manage Notes</a>
        </div>
    </div>
    <div class="ms-2 mt-4">
        <p type="button" class="m-0 text-white fw-500" @click="open = 4">
            <span>Chapter Videos</span>
            <svg x-show="open != 4" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="white" />
            </svg>
            <svg x-cloak x-show="open == 4" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="white" />
            </svg>
        </p>
        <div x-cloak x-show="open == 4" >
            <a href="{{ env('APP_URL') }}/admin/dashboard/add-videos"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Add
                Chapter Videos</a>
            <a href="{{ env('APP_URL') }}/admin/dashboard/manage-videos"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Manage
                Chapter Videos</a>
        </div>
    </div>
    <div class="ms-2 mt-4">
        <p type="button" class="m-0 text-white fw-500" @click="open = 5">
            <span>Quiz</span>
            <svg x-show="open != 5" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="white" />
            </svg>
            <svg x-cloak x-show="open == 5" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="white" />
            </svg>
        </p>
        <div x-cloak x-show="open == 5" >
            <a href="{{ env('APP_URL') }}/admin/dashboard/add-mcq"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Add
                Mcq Questions</a>
            <a href="{{ env('APP_URL') }}/admin/dashboard/manage-mcq"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Manage
                Mcq Questions</a>
        </div>
    </div>
    <div class="ms-2 mt-4">
        <p type="button" class="m-0 text-white fw-500" @click="open = 6">
            <span>Settings</span>
            <svg x-show="open != 6" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41 0L6 4.58L10.59 0L12 1.41L6 7.41L0 1.41L1.41 0Z" fill="white" />
            </svg>
            <svg x-cloak x-show="open == 6" width="12" height="8" viewBox="0 0 12 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M10.59 7.41L6 2.83L1.41 7.41L0 6L6 3.8147e-06L12 6L10.59 7.41Z" fill="white" />
            </svg>
        </p>
        <div x-cloak x-show="open == 6" >
            <a href="{{ env('APP_URL') }}/admin/dashboard/website-settings"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Website
                Settings</a>
            <a href="{{ env('APP_URL') }}/admin/dashboard/profile-settings"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Profile Settings</a>
            <a href="{{ env('APP_URL') }}/admin/dashboard/change-password"
                class="d-block border border-2 border-white border-top-0 border-bottom-0 border-end-0 ps-2 ms-3 text-decoration-none text-white pt-1">Change Password</a>
        </div>
    </div>
    <div class="ms-2 mt-4">
        <a class="m-0 text-white fw-500 text-decoration-none" href="{{ env('APP_URL') }}/admin/dashboard/manage-contact">Manage Contacts</a>
    </div>

</div>
