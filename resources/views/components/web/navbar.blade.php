<!-- MOBILE NAVBAR -->
<section class="d-lg-none">
    <nav class="bg-light pb-2">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between py-2">
                <div class="d-flex align-items-center">
                    <button class="btn p-0 px-1 rounded-0 me-1" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 12H16V10H0V12ZM0 7H16V5H0V7ZM0 0V2H16V0H0Z" class="fill-dark" />
                        </svg>
                    </button>
                    <a href="{{ env('APP_URL') }}"
                        class="offcanvas-title fs-25 fw-800 text-decoration-none text-dark d-flex align-items-center">
                        <img class="me-1" width="50" height="50"
                            src="{{ \App\Models\WebsiteInfo::where('id', 1)->first()->value }}" alt="logo" />
                        <div>
                            <p class="m-0 fs-15" style="color: #6901BC;">ReviseChemistry</p>
                            <p class="m-0 fs-10 fw-400">Chemistry For IGCSE, IB & Beyond</p>
                            <p class="m-0 fs-10 fw-400" style="color: #B22222;">Revision made Easy</p>
                        </div>
                    </a>
                </div>
                @php
                    if (isset($_COOKIE['student_token'])) {
                        $user = \App\Models\Student::where('token', $_COOKIE['student_token']);
                        if (!$user->exists()) {
                            echo '
                                <div class="me-4"><a href="'.env('APP_URL').'/login"
                                            class="btn btn-outline-dark rounded-0 px-3 fs-15 px-2 fw-600">Login</a></div>
                            ';
                        } else {
                            $useremail = $user->first()->email;
                            @endphp
                                <livewire:logout-logic-livewire-component :useremail=$useremail :userrole=1 />
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
            <div class="w-100 position-relative">
                <div class="d-flex position-relative">
                    <input class="mobile-main-navbar-searchField form-control rounded-0 bg-light border-dark"
                        type="text" placeholder="search notes" />
                    <button type="submit" class="mobile-main-navbar-searchBtn btn position-absolute end-0">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11V11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z"
                                class="fill-dark" />
                        </svg>
                    </button>
                </div>
                <!-- OMNI BOX -->
                <div class="position-absolute w-100 mt-2 z-index-999">
                    <ul class="mobile-main-navbar-omnibox list-group rounded-0">
                    </ul>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header d-flex align-items-center">
                <h5 id="offcanvasExampleLabel" class="fs-25 fw-800 text-dark m-0">ReviseChemistry</h5>
                <button type="button" class="btn-close text-reset rounded-0" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="dropdown">
                    <a class="nav-link text-dark" href="{{ env('APP_URL') }}">Home</a>
                </div>
                <div class="dropdown">
                    @php
                        $olevel_chapters = \App\Models\Note::where('category', 'O Levels')->get();
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">O Levels / IGCSE</a>
                    <ul class="dropdown-menu custom-dropdown-menu">
                        @if (count($olevel_chapters) > 0)
                            @foreach ($olevel_chapters as $olevel_chapter)
                                <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                        href="{{ env('APP_URL') }}/note/category/{{ $olevel_chapter->id }}">{{ $olevel_chapter->chapter }}</a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/note/category/{{ $olevel_chapter->id }}">Concept
                                                Summary</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/video/category/{{ $olevel_chapter->id }}">Video</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $olevel_chapter->id }}">Exam
                                                based MCQ</a></li>
                                    </ul>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                    Added</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="dropdown">
                    @php
                        $mypib_chapters = \App\Models\Note::where('category', 'MYPIB')->get();
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">MYP IB</a>
                    <ul class="dropdown-menu custom-dropdown-menu">
                        @if (count($mypib_chapters) > 0)
                            @foreach ($mypib_chapters as $mypib_chapter)
                                <li>
                                    <a class="dropdown-item text-ellipsis" style="width:220px;"
                                        href="{{ env('APP_URL') }}/note/category/{{ $mypib_chapter->id }}">{{ $mypib_chapter->chapter }}</a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/note/category/{{ $mypib_chapter->id }}">Concept
                                                Summary</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/video/category/{{ $mypib_chapter->id }}">Video</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $mypib_chapter->id }}">Exam
                                                based MCQ</a></li>
                                    </ul>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                    Added</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="dropdown">
                    @php
                        $ibdp_chapters = \App\Models\Note::where('category', 'IBDP SL-HL')->get();
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">IB DP SL/HL</a>
                    <ul class="dropdown-menu custom-dropdown-menu">
                        @if (count($ibdp_chapters) > 0)
                            @foreach ($ibdp_chapters as $ibdp_chapter)
                                <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                        href="{{ env('APP_URL') }}/note/category/{{ $ibdp_chapter->id }}">{{ $ibdp_chapter->chapter }}</a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/note/category/{{ $ibdp_chapter->id }}">Concept
                                                Summary</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/video/category/{{ $ibdp_chapter->id }}">Video</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $ibdp_chapter->id }}">Exam
                                                based MCQ</a></li>
                                    </ul>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                    Added</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="dropdown">
                    @php
                        $alevel_chapters = \App\Models\Note::where('category', 'A Levels')->get();
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">A/AS Levels</a>
                    <ul class="dropdown-menu custom-dropdown-menu">
                        @if (count($alevel_chapters) > 0)
                            @foreach ($alevel_chapters as $alevel_chapter)
                                <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                        href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">{{ $alevel_chapter->chapter }}</a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">Concept
                                                Summary</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/video/category/{{ $alevel_chapter->id }}">Video</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $alevel_chapter->id }}">Exam
                                                based MCQ</a></li>
                                    </ul>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                    Added</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="dropdown">
                    @php
                        $alevel_chapters = \App\Models\Note::where('category', 'AP Chemistry')->get();
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">AP Chemistry</a>
                    <ul class="dropdown-menu custom-dropdown-menu">
                        @if (count($alevel_chapters) > 0)
                            @foreach ($alevel_chapters as $alevel_chapter)
                                <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                        href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">{{ $alevel_chapter->chapter }}</a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">Concept
                                                Summary</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/video/category/{{ $alevel_chapter->id }}">Video</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $alevel_chapter->id }}">Exam
                                                based MCQ</a></li>
                                    </ul>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                    Added</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="dropdown">
                    @php
                        $alevel_chapters = \App\Models\Note::where('category', 'DAT Chemistry')->get();
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">DAT Chemistry</a>
                    <ul class="dropdown-menu custom-dropdown-menu">
                        @if (count($alevel_chapters) > 0)
                            @foreach ($alevel_chapters as $alevel_chapter)
                                <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                        href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">{{ $alevel_chapter->chapter }}</a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">Concept
                                                Summary</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/video/category/{{ $alevel_chapter->id }}">Video</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $alevel_chapter->id }}">Exam
                                                based MCQ</a></li>
                                    </ul>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                    Added</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="dropdown">
                    @php
                        $alevel_chapters = \App\Models\Note::where('category', 'IA Ideas')->get();
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">IA Ideas</a>
                    <ul class="dropdown-menu custom-dropdown-menu">
                        @if (count($alevel_chapters) > 0)
                            @foreach ($alevel_chapters as $alevel_chapter)
                                <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                        href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">{{ $alevel_chapter->chapter }}</a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">Concept
                                                Summary</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/video/category/{{ $alevel_chapter->id }}">Video</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $alevel_chapter->id }}">Exam
                                                based MCQ</a></li>
                                    </ul>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                    Added</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="dropdown">
                    <a class="nav-link" href="{{ env('APP_URL') }}/forum">Forum</a>
                </div>
                <div class="dropdown">
                    <a class="nav-link text-dark" href="{{ env('APP_URL') }}/blog">Blog</a>
                </div>
                <div class="dropdown">
                    <a class="nav-link text-dark" href="{{ env('APP_URL') }}/contact-us">Contact us</a>
                </div>
            </div>
        </div>
    </nav>
</section>

<!-- DESKTOP NAVBAR -->
<nav class="d-none d-lg-block">
    <div class="bg-light">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between py-3">
                <div>
                    <a href="{{ env('APP_URL') }}"
                        class="offcanvas-title fw-800 d-flex text-decoration-none text-dark align-items-center">
                        <img width="120" height="120" src="{{ \App\Models\WebsiteInfo::where('id', 1)->first()->value }}" alt="logo" />
                        <div>
                            <p class="m-0 fs-25" style="color: #6901BC;">ReviseChemistry</p>
                            <p class="m-0 fs-20 fw-400">Chemistry For IGCSE, IB & Beyond</p>
                            <p class="m-0 fs-20 fw-400" style="color: #C04C4C;">Revision made Easy</p>
                        </div>
                    </a>
                </div>
                <div class="w-100 position-relative">
                    <div class="d-flex position-relative mx-3">
                        <input class="desktop-main-navbar-searchField form-control rounded-0 bg-light border-dark"
                            type="text" placeholder="search notes" />
                        <button type="submit" class="desktop-main-navbar-searchBtn btn position-absolute end-0">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11V11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z"
                                    class="fill-dark" />
                            </svg>
                        </button>
                    </div>
                    <!-- OMNI BOX -->
                    <div class="position-absolute w-100 mt-2 z-index-999">
                        <ul class="desktop-main-navbar-omnibox list-group rounded-0">
                        </ul>
                    </div>
                </div>

                @php
                    if (isset($_COOKIE['student_token'])) {
                        $user = \App\Models\Student::where('token', $_COOKIE['student_token']);
                        if (!$user->exists()) {
                            echo '
                                <div class="me-4"><a href="'.env('APP_URL').'/login"
                                            class="btn btn-outline-dark rounded-0 px-3 fs-15 px-2 fw-600">Login</a></div>
                            ';
                        } else {
                            $useremail = $user->first()->email;
                            @endphp
                                <livewire:logout-logic-livewire-component :useremail=$useremail :userrole=1 />
                            @php
                        }
                    } else {
                        echo '
                            <div class="me-4"><a href="'.env('APP_URL').'/login"
                                        class="btn btn-outline-dark rounded-0 px-3 fs-15 px-2 fw-600">Login</a></div>
                        ';
                    }
                @endphp


                <div class="d-flex">
                    <a href="{{ \App\Models\WebsiteInfo::where('id', 2)->first()->value }}" class="m-0 text-decoration-none me-3">
                        <svg width="30" height="30" viewBox="0 0 448 446" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M448 224C448 100.3 347.7 0 224 0C100.3 0 0 100.3 0 224C0 335.8 81.9 428.47 189 445.29V288.77H132.11V224H189V174.65C189 118.52 222.45 87.49 273.61 87.49C298.12 87.49 323.76 91.87 323.76 91.87V147H295.5C267.69 147 258.99 164.26 258.99 182V224H321.11L311.19 288.77H259V445.31C366.1 428.5 448 335.83 448 224V224Z"
                                fill="#35AFD6" />
                        </svg>
                    </a>
                    <a href="{{ \App\Models\WebsiteInfo::where('id', 3)->first()->value }}" class="m-0 text-decoration-none me-3">
                        <svg width="30" height="30" viewBox="0 0 448 448" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M317.33 37.33C342.063 37.4039 365.761 47.2616 383.25 64.7502C400.738 82.2389 410.596 105.937 410.67 130.67V317.33C410.596 342.063 400.738 365.761 383.25 383.25C365.761 400.738 342.063 410.596 317.33 410.67H130.67C105.937 410.596 82.2389 400.738 64.7502 383.25C47.2616 365.761 37.4039 342.063 37.33 317.33V130.67C37.4039 105.937 47.2616 82.2389 64.7502 64.7502C82.2389 47.2616 105.937 37.4039 130.67 37.33H317.33V37.33ZM317.33 0H130.67C58.8 0 0 58.8 0 130.67V317.33C0 389.2 58.8 448 130.67 448H317.33C389.2 448 448 389.2 448 317.33V130.67C448 58.8 389.2 0 317.33 0V0Z"
                                fill="#FF00F7" />
                            <path
                                d="M345.33 130.67C339.792 130.67 334.379 129.028 329.774 125.951C325.17 122.874 321.581 118.501 319.461 113.385C317.342 108.269 316.788 102.639 317.868 97.2074C318.948 91.7759 321.615 86.7868 325.531 82.8709C329.447 78.9551 334.436 76.2883 339.868 75.2079C345.299 74.1276 350.929 74.6821 356.045 76.8013C361.162 78.9206 365.534 82.5094 368.611 87.114C371.688 91.7185 373.33 97.1321 373.33 102.67C373.338 106.349 372.619 109.994 371.215 113.394C369.81 116.795 367.748 119.885 365.147 122.487C362.545 125.088 359.455 127.15 356.055 128.555C352.654 129.959 349.009 130.678 345.33 130.67V130.67ZM224 149.33C238.768 149.33 253.205 153.709 265.484 161.914C277.764 170.119 287.335 181.781 292.986 195.425C298.638 209.069 300.116 224.083 297.235 238.567C294.354 253.052 287.242 266.357 276.8 276.8C266.357 287.242 253.052 294.354 238.567 297.235C224.083 300.116 209.069 298.638 195.425 292.986C181.781 287.334 170.119 277.764 161.914 265.484C153.709 253.205 149.33 238.768 149.33 224C149.351 204.203 157.225 185.222 171.224 171.224C185.223 157.225 204.203 149.351 224 149.33V149.33ZM224 112C201.849 112 180.194 118.569 161.776 130.875C143.358 143.182 129.003 160.674 120.526 181.139C112.049 201.605 109.831 224.124 114.152 245.85C118.474 267.576 129.141 287.532 144.804 303.196C160.468 318.859 180.424 329.526 202.15 333.848C223.876 338.169 246.395 335.951 266.861 327.474C287.326 318.997 304.818 304.642 317.125 286.224C329.431 267.805 336 246.151 336 224C336 194.296 324.2 165.808 303.196 144.804C282.192 123.8 253.704 112 224 112V112Z"
                                fill="#FF00F7" />
                        </svg>
                    </a>
                    <a href="{{ \App\Models\WebsiteInfo::where('id', 4)->first()->value }}" class="m-0 text-decoration-none me-3">
                        <svg width="30" height="30" viewBox="0 0 512 385" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M508.646 84.79C508.646 39.79 475.546 3.59 434.646 3.59C379.246 0.999996 322.746 0 265.006 0H247.006C189.406 0 132.806 0.999999 77.4061 3.6C36.6061 3.6 3.50608 40 3.50608 85C1.00608 120.59 -0.0539189 156.19 0.00608108 191.79C-0.0939189 227.39 1.03941 263.023 3.40608 298.69C3.40608 343.69 36.5061 380.19 77.3061 380.19C135.506 382.89 195.206 384.09 255.906 383.99C316.706 384.19 376.239 382.923 434.506 380.19C475.406 380.19 508.506 343.69 508.506 298.69C510.906 262.99 512.006 227.39 511.906 191.69C512.133 156.09 511.046 120.457 508.646 84.79ZM207.006 289.89V93.39L352.006 191.59L207.006 289.89Z"
                                fill="#FF0000" />
                        </svg>
                    </a>
                    <a href="{{ \App\Models\WebsiteInfo::where('id', 5)->first()->value }}" class="m-0 text-decoration-none me-3">
                        <svg width="30" height="30" viewBox="0 0 480 385" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M480 45.5002C461.995 53.3237 442.944 58.478 423.45 60.8002C443.937 48.804 459.343 29.7458 466.78 7.20017C447.411 18.5261 426.256 26.4729 404.22 30.7002C394.941 20.9755 383.781 13.2392 371.419 7.96162C359.057 2.68402 345.751 -0.0246733 332.31 0.000169344C277.89 0.000169344 233.85 43.4002 233.85 96.9002C233.811 104.342 234.664 111.761 236.39 119C197.367 117.171 159.155 107.216 124.2 89.7727C89.2444 72.3294 58.3149 47.7818 33.39 17.7002C24.6457 32.4414 20.0213 49.2606 20 66.4002C20 100 37.53 129.7 64 147.1C48.3173 146.728 32.9559 142.577 19.22 135V136.2C19.22 183.2 53.22 222.3 98.22 231.2C89.7578 233.456 81.0377 234.599 72.28 234.6C66.0658 234.611 59.8657 234.008 53.77 232.8C66.28 271.3 102.69 299.3 145.82 300.1C110.774 327.109 67.7462 341.708 23.5 341.6C15.6462 341.589 7.79966 341.121 0 340.2C45.0118 368.942 97.3345 384.146 150.74 384C332.1 384 431.18 236.3 431.18 108.2C431.18 104 431.07 99.8002 430.87 95.7002C450.101 82.0208 466.738 65.0213 480 45.5002V45.5002Z"
                                fill="#089ECD" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="d-none d-md-block custom-bg-purple">
    <nav class=" navbar navbar-expand-sm navbar-dark container p-0">
        <div class="container-fluid py-2">
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav d-flex flex-column flex-xl-row">
                    <div class="d-flex">
                        <li class="nav-item"><a class="nav-link text-white fs-15"
                                href="{{ env('APP_URL') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown custom-dropdown" id="myDropdown">
                            @php
                                $olevel_chapters = \App\Models\Note::where('category', 'O Levels')->get();
                            @endphp
                            <a class="nav-link dropdown-toggle text-white fs-15" href="#" data-bs-toggle="dropdown">O
                                Levels / IGCSE</a>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                @if (count($olevel_chapters) > 0)
                                    @foreach ($olevel_chapters as $olevel_chapter)
                                        <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                                href="{{ env('APP_URL') }}/note/category/{{ $olevel_chapter->id }}">{{ $olevel_chapter->chapter }}</a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/note/category/{{ $olevel_chapter->id }}">Concept
                                                        Summary</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/video/category/{{ $olevel_chapter->id }}">Video</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $olevel_chapter->id }}">Exam
                                                        based MCQ</a></li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                            Added</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown custom-dropdown" id="myDropdown">
                            @php
                                $mypib_chapters = \App\Models\Note::where('category', 'MYPIB')->get();
                            @endphp
                            <a class="nav-link dropdown-toggle text-white fs-15" href="#" data-bs-toggle="dropdown">MYP
                                IB</a>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                @if (count($mypib_chapters) > 0)
                                    @foreach ($mypib_chapters as $mypib_chapter)
                                        <li>
                                            <a class="dropdown-item text-ellipsis" style="width:220px;"
                                                href="{{ env('APP_URL') }}/note/category/{{ $mypib_chapter->id }}">{{ $mypib_chapter->chapter }}</a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/note/category/{{ $mypib_chapter->id }}">Concept
                                                        Summary</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/video/category/{{ $mypib_chapter->id }}">Video</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $mypib_chapter->id }}">Exam
                                                        based MCQ</a></li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                            Added</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown custom-dropdown" id="myDropdown">
                            @php
                                $ibdp_chapters = \App\Models\Note::where('category', 'IBDP SL-HL')->get();
                            @endphp
                            <a class="nav-link dropdown-toggle text-white fs-15" href="#" data-bs-toggle="dropdown">IB
                                DP SL / HL</a>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                @if (count($ibdp_chapters) > 0)
                                    @foreach ($ibdp_chapters as $ibdp_chapter)
                                        <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                                href="{{ env('APP_URL') }}/note/category/{{ $ibdp_chapter->id }}">{{ $ibdp_chapter->chapter }}</a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/note/category/{{ $ibdp_chapter->id }}">Concept
                                                        Summary</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/video/category/{{ $ibdp_chapter->id }}">Video</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $ibdp_chapter->id }}">Exam
                                                        based MCQ</a></li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                            Added</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown custom-dropdown" id="myDropdown">
                            @php
                                $alevel_chapters = \App\Models\Note::where('category', 'A Levels')->get();
                            @endphp
                            <a class="nav-link dropdown-toggle text-white fs-15" href="#" data-bs-toggle="dropdown">A /
                                As Level</a>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                @if (count($alevel_chapters) > 0)
                                    @foreach ($alevel_chapters as $alevel_chapter)
                                        <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                                href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">{{ $alevel_chapter->chapter }}</a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">Concept
                                                        Summary</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/video/category/{{ $alevel_chapter->id }}">Video</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $alevel_chapter->id }}">Exam
                                                        based MCQ</a></li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                            Added</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </div>
                    <div class="d-flex">
                        <li class="nav-item dropdown custom-dropdown" id="myDropdown">
                            @php
                                $alevel_chapters = \App\Models\Note::where('category', 'AP Chemistry')->get();
                            @endphp
                            <a class="nav-link dropdown-toggle text-white fs-15" href="#" data-bs-toggle="dropdown">AP
                                Chemistry</a>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                @if (count($alevel_chapters) > 0)
                                    @foreach ($alevel_chapters as $alevel_chapter)
                                        <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                                href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">{{ $alevel_chapter->chapter }}</a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">Concept
                                                        Summary</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/video/category/{{ $alevel_chapter->id }}">Video</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $alevel_chapter->id }}">Exam
                                                        based MCQ</a></li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                            Added</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown custom-dropdown" id="myDropdown">
                            @php
                                $alevel_chapters = \App\Models\Note::where('category', 'DAT Chemistry')->get();
                            @endphp
                            <a class="nav-link dropdown-toggle text-white fs-15" href="#" data-bs-toggle="dropdown">DAT
                                Chemistry</a>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                @if (count($alevel_chapters) > 0)
                                    @foreach ($alevel_chapters as $alevel_chapter)
                                        <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                                href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">{{ $alevel_chapter->chapter }}</a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">Concept
                                                        Summary</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/video/category/{{ $alevel_chapter->id }}">Video</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $alevel_chapter->id }}">Exam
                                                        based MCQ</a></li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                            Added</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown custom-dropdown" id="myDropdown">
                            @php
                                $alevel_chapters = \App\Models\Note::where('category', 'IA Ideas')->get();
                            @endphp
                            <a class="nav-link dropdown-toggle text-white fs-15" href="#" data-bs-toggle="dropdown">IA
                                Ideas</a>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                @if (count($alevel_chapters) > 0)
                                    @foreach ($alevel_chapters as $alevel_chapter)
                                        <li><a class="dropdown-item text-ellipsis" style="width:220px;"
                                                href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">{{ $alevel_chapter->chapter }}</a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/note/category/{{ $alevel_chapter->id }}">Concept
                                                        Summary</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/video/category/{{ $alevel_chapter->id }}">Video</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ env('APP_URL') }}/quiz/category/chapter/{{ $alevel_chapter->id }}">Exam
                                                        based MCQ</a></li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a class="dropdown-item text-ellipsis" style="width:220px;" href="#">No Chapter
                                            Added</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white fs-15"
                                href="{{ env('APP_URL') }}/forum">Forum</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white fs-15"
                                href="{{ env('APP_URL') }}/blog">Blog</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white fs-15"
                                href="{{ env('APP_URL') }}/contact-us">Contact</a></li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</div>
