<section class="bg-light">
    <nav class="container-fluid py-4">
        <div class="d-flex align-items-center justify-content-between justify-content-md-end">
            <button class="d-md-none btn btn-dark rounde-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <svg width="16" height="16" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2H26M2 12H26M2 22H26" stroke="white" stroke-width="4" stroke-miterlimit="10"
                        stroke-linecap="round" />
                </svg>
            </button>
            @php
                if (isset($_COOKIE['admin_token'])) {
                    $user = \App\Models\Admin::where('token', $_COOKIE['admin_token']);
                    if (!$user->exists()) {
                        echo '
                            <div class="me-4"><a href="'.env('APP_URL').'/login"
                                        class="btn btn-outline-dark rounded-0 px-3 fs-15 px-2 fw-600">Login</a></div>
                        ';
                    } else {
                        $useremail = $user->first()->email;
                        @endphp
                            <livewire:logout-logic-livewire-component :useremail=$useremail :userrole=0 />
                        @php
                    }
                } else {
                    echo '
                        <div class="me-4"><a href="'.env('APP_URL').'/login"
                                    class="btn btn-outline-dark rounded-0 px-3 fs-15 px-2 fw-600">Login</a></div>
                    ';
                }
            @endphp
        </div>
    </nav>
</section>
