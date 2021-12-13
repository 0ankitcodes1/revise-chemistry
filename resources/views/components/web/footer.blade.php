<footer class="bg-light">
    <div class="container py-0 pb-5">
        <div class="row">
            <div class="col-12 col-md-6 mt-5">
                <div class="mt-3">
                    <h3 class="fs-20 fw-700">Download Our App</h3>
                    <a href="{{ \App\Models\WebsiteInfo::where('id', 11)->first()->value }}" class="text-decoration-none">
                        <img width="95" src="{{ asset('resources/images/android-store.png') }}" alt="android icon">
                    </a>
                    <a href="{{ \App\Models\WebsiteInfo::where('id', 12)->first()->value }}" class="text-decoration-none">
                        <img width="150" src="{{ asset('resources/images/app-store.png') }}" alt="apple icon">
                    </a>
                </div>
                <div class="mt-3">
                    <p class="m-0 me-2 fs-20 fw-700 text-dark">Connect with us</p>
                    <div class="mt-2">
                        <a href="{{ \App\Models\WebsiteInfo::where('id', 2)->first()->value }}" class="m-0 text-decoration-none me-3">
                            <svg Swidth="20" height="20" viewBox="0 0 448 446" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M448 224C448 100.3 347.7 0 224 0C100.3 0 0 100.3 0 224C0 335.8 81.9 428.47 189 445.29V288.77H132.11V224H189V174.65C189 118.52 222.45 87.49 273.61 87.49C298.12 87.49 323.76 91.87 323.76 91.87V147H295.5C267.69 147 258.99 164.26 258.99 182V224H321.11L311.19 288.77H259V445.31C366.1 428.5 448 335.83 448 224V224Z"
                                    fill="#35AFD6" />
                            </svg>
                        </a>
                        <a href="{{ \App\Models\WebsiteInfo::where('id', 3)->first()->value }}" class="m-0 text-decoration-none me-3">
                            <svg Swidth="20" height="20" viewBox="0 0 448 448" fill="none"
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
                            <svg Swidth="17" height="17" viewBox="0 0 512 385" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M508.646 84.79C508.646 39.79 475.546 3.59 434.646 3.59C379.246 0.999996 322.746 0 265.006 0H247.006C189.406 0 132.806 0.999999 77.4061 3.6C36.6061 3.6 3.50608 40 3.50608 85C1.00608 120.59 -0.0539189 156.19 0.00608108 191.79C-0.0939189 227.39 1.03941 263.023 3.40608 298.69C3.40608 343.69 36.5061 380.19 77.3061 380.19C135.506 382.89 195.206 384.09 255.906 383.99C316.706 384.19 376.239 382.923 434.506 380.19C475.406 380.19 508.506 343.69 508.506 298.69C510.906 262.99 512.006 227.39 511.906 191.69C512.133 156.09 511.046 120.457 508.646 84.79ZM207.006 289.89V93.39L352.006 191.59L207.006 289.89Z"
                                    fill="#FF0000" />
                            </svg>
                        </a>
                        <a href="{{ \App\Models\WebsiteInfo::where('id', 5)->first()->value }}" class="m-0 text-decoration-none me-3">
                            <svg Swidth="17" height="17" viewBox="0 0 480 385" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M480 45.5002C461.995 53.3237 442.944 58.478 423.45 60.8002C443.937 48.804 459.343 29.7458 466.78 7.20017C447.411 18.5261 426.256 26.4729 404.22 30.7002C394.941 20.9755 383.781 13.2392 371.419 7.96162C359.057 2.68402 345.751 -0.0246733 332.31 0.000169344C277.89 0.000169344 233.85 43.4002 233.85 96.9002C233.811 104.342 234.664 111.761 236.39 119C197.367 117.171 159.155 107.216 124.2 89.7727C89.2444 72.3294 58.3149 47.7818 33.39 17.7002C24.6457 32.4414 20.0213 49.2606 20 66.4002C20 100 37.53 129.7 64 147.1C48.3173 146.728 32.9559 142.577 19.22 135V136.2C19.22 183.2 53.22 222.3 98.22 231.2C89.7578 233.456 81.0377 234.599 72.28 234.6C66.0658 234.611 59.8657 234.008 53.77 232.8C66.28 271.3 102.69 299.3 145.82 300.1C110.774 327.109 67.7462 341.708 23.5 341.6C15.6462 341.589 7.79966 341.121 0 340.2C45.0118 368.942 97.3345 384.146 150.74 384C332.1 384 431.18 236.3 431.18 108.2C431.18 104 431.07 99.8002 430.87 95.7002C450.101 82.0208 466.738 65.0213 480 45.5002V45.5002Z"
                                    fill="#089ECD" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-3 mt-5">
                <h3 class="fs-20 text-dark fw-700">Notes</h3>
                <ul class="navbar-nav">
                    <li><a href="{{ env('APP_URL') }}/note/O Levels"
                            class="text-decoration-none text-dark fs-20 fw-500">➡ O Levels</a></li>
                    <li class="mt-1"><a href="{{ env('APP_URL') }}/note/MYPIB"
                            class="text-decoration-none text-dark fs-20 fw-500">➡ MYPIB</a></li>
                    <li class="mt-1"><a href="{{ env('APP_URL') }}/note/IBDP SL-HL"
                            class="text-decoration-none text-dark fs-20 fw-500">➡ IBDP SL/HL</a></li>
                    <li class="mt-1"><a href="{{ env('APP_URL') }}/note/A Levels"
                            class="text-decoration-none text-dark fs-20 fw-500">➡ A Levels</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3 mt-5">
                <h3 class="fs-20 text-dark fw-700">Quick Links</h3>
                <ul class="navbar-nav">
                    <li><a href="{{ env('APP_URL') }}/login" class="text-decoration-none text-dark fs-20 fw-500">➡
                            Login</a></li>
                    <li class="mt-1"><a href="{{ env('APP_URL') }}/signup"
                            class="text-decoration-none text-dark fs-20 fw-500">➡ Signup</a></li>
                    <li class="mt-1"><a href="{{ env('APP_URL') }}/blog"
                            class="text-decoration-none text-dark fs-20 fw-500">➡ Blog</a></li>
                    <li><a href="{{ env('APP_URL') }}/forum" class="text-decoration-none text-dark fs-20 fw-500">➡
                            Forum</a></li>
                    <li class="mt-1"><a href="{{ env('APP_URL') }}/contact-us"
                            class="text-decoration-none text-dark fs-20 fw-500">➡ Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-5">
            <p class="m-0 fs-15 fw-400">&copy; 2021 All right reserved. Designed and created by Study Buddy</p>
        </div>
    </div>
</footer>
