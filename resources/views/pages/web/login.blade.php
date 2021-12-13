@php
if (isset($_COOKIE['student_token'])) {
    $user = \App\Models\Student::where('token', $_COOKIE['student_token']);
    if ($user->exists()) {
        header('Location:' . env('APP_URL') . '/dashboard');
        exit();
    }
}
@endphp
@extends('layouts.web')

@section('page-title')
    <title>ReviseChemistry : Chemistry For IGCSE, IB & Beyond. We make revision easy for you.</title>
@stop

@section('content')
    <!-- BREADCRUMB -->
    <section class="bg-light">
        <div class="container pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"
                            class="text-decoration-none text-dark fw-500">Home</a></li>
                    <li class="breadcrumb-item fw-500 active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </section>
    {{-- <section class="bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-5">
                    <svg class="hero-resize" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="924.25571"
                        height="530.59141" viewBox="0 0 924.25571 530.59141">
                        <path
                            d="M153.99839,343.96646a12.41567,12.41567,0,0,1-15.82023-14.58779c7.2237-30.05261,34.69161-103.54642,134.7581-134.45784,43.34522-13.38973,84.91357-13.6183,123.4999-.68442,31.74358,10.5963,52.81666,27.17817,62.8969,35.19276a12.31341,12.31341,0,0,1,2.01684,17.2966q-.03769.04756-.07578.09478a12.60339,12.60339,0,0,1-17.56068,1.99337c-18.26292-14.38965-73.68419-58.10507-163.507-30.358C192.50012,245.54917,168.67559,308.922,162.49613,334.8498a12.231,12.231,0,0,1-8.49772,9.11663Z"
                            transform="translate(-137.87214 -184.7043)" fill="#45526c" />
                        <path
                            d="M426.73845,514.18533a12.34637,12.34637,0,0,1-3.06766.57666c-78.17506,4.21048-127.91326-60.73529-129.95531-63.443l-.37854-.625c-1.24641-1.9334-31.34184-47.72251-18.09281-84.08779,6.08557-16.62508,19.54445-28.29437,40.11648-34.64925,19.13286-5.91031,34.789-4.16228,48.11506,5.35352,10.92682,7.75306,17.92964,19.31492,24.71706,30.47965,14.11648,23.18223,22.76773,34.97678,49.59965,28.17194,11.7813-2.99018,17.28227-12.20122,19.79538-19.37637,6.76634-19.52475.76956-46.14261-15.09594-66.28064-20.49737-26.12617-77.85958-69.52025-148.63419-47.65734-30.22313,9.33619-54.95754,27.73438-71.52166,53.06787-13.7221,21.0243-21.69933,47.13651-21.87422,71.48765-.27535,45.34076,36.88411,104.99127,37.23649,105.53159a12.29021,12.29021,0,0,1-3.90573,16.9365q-.05694.03569-.11432.07064a12.58421,12.58421,0,0,1-17.235-3.857c-1.67723-2.72769-41.35566-66.32964-41.036-118.73213.445-56.79989,34.96136-124.58835,111.15411-148.125,35.218-10.87915,72.22851-9.05063,107.05754,5.2294,26.99516,11.13575,51.979,29.56992,68.49689,50.61924,21.09753,26.86815,28.53047,62.03785,18.92612,89.48734-6.40291,18.29963-19.65878,30.92632-37.27532,35.44085-45.91379,11.67926-63.90024-17.72645-77.01809-39.17694-13.47024-21.99081-20.92115-32.30138-44.20227-25.10964-12.78346,3.94893-20.6589,10.27669-23.97114,19.368-4.50722,12.428-.2356,28.3576,4.14148,39.525q.068.17513.13632.34941a100.94624,100.94624,0,0,0,25.61319,37.2525c18.01213,16.63359,51.45108,40.347,94.06986,38.06039a12.30862,12.30862,0,0,1,13.04809,11.52176q.00366.059.00676.11808a12.57887,12.57887,0,0,1-8.85231,12.472Z"
                            transform="translate(-137.87214 -184.7043)" fill="#45526c" />
                        <path
                            d="M331.94027,537.53418a12.61554,12.61554,0,0,1-9.87051-1.03136c-38.55715-21.8457-65.6247-51.22826-85.116-92.41043l-.07845-.254c-12.28417-27.45774-19.679-69.409-3.36722-104.86565,12.04219-26.16234,34.6464-44.55164,67.07064-54.56777,38.35034-11.84676,74.05914-3.12453,103.36639,25.10254A153.17045,153.17045,0,0,1,435.92915,354.806a12.51646,12.51646,0,0,1-23.03067,9.80375,128.26069,128.26069,0,0,0-26.96612-37.76029c-22.58989-21.4921-48.85011-27.847-78.142-18.79853-25.31292,7.81938-42.74322,21.64284-51.66594,41.09183-12.86749,27.9938-6.24257,62.94941,3.3706,84.46244,17.18645,36.42267,41.02542,62.25848,74.9609,81.45139a12.25531,12.25531,0,0,1,4.65458,16.69492q-.047.08328-.09529.1659A12.56861,12.56861,0,0,1,331.94027,537.53418Z"
                            transform="translate(-137.87214 -184.7043)" fill="#45526c" />
                        <circle cx="198.12848" cy="213.76821" r="15.94905" fill="#e6e6e6" />
                        <path
                            d="M623.57559,593.22447a6.56974,6.56974,0,0,1-.98437-.07421,6.45924,6.45924,0,0,1-4.26075-2.56934L609.56973,578.702a6.49853,6.49853,0,0,1,1.373-9.08886l74.89941-55.24024a6.49989,6.49989,0,0,1,9.08985,1.373l8.75976,11.87793a6.50087,6.50087,0,0,1-1.37207,9.08984L627.42032,591.954A6.45374,6.45374,0,0,1,623.57559,593.22447Z"
                            transform="translate(-137.87214 -184.7043)" fill="#45526c" />
                        <path
                            d="M676.76876,548.74834,665.30524,533.2051a6,6,0,0,1,1.26743-8.39009l43.86106-38.42993a6,6,0,0,1,8.39009,1.26743l20.96352,25.04324a6,6,0,0,1-1.26743,8.39009l-53.36106,28.92993A6,6,0,0,1,676.76876,548.74834Z"
                            transform="translate(-137.87214 -184.7043)" fill="#2f2e41" />
                        <path
                            d="M747.24551,714.95592H732.48672a6.50753,6.50753,0,0,1-6.5-6.5V585.44127a6.50753,6.50753,0,0,1,6.5-6.5h14.75879a6.50753,6.50753,0,0,1,6.5,6.5V708.45592A6.50753,6.50753,0,0,1,747.24551,714.95592Z"
                            transform="translate(-137.87214 -184.7043)" fill="#45526c" />
                        <path
                            d="M776.4379,714.95592H761.67813a6.50753,6.50753,0,0,1-6.5-6.5V585.44127a6.50753,6.50753,0,0,1,6.5-6.5H776.4379a6.50753,6.50753,0,0,1,6.5,6.5V708.45592A6.50753,6.50753,0,0,1,776.4379,714.95592Z"
                            transform="translate(-137.87214 -184.7043)" fill="#45526c" />
                        <rect x="452.92269" y="528.35068" width="324.03261" height="2.24072" fill="#3f3d56" />
                        <circle cx="610.21645" cy="195.74247" r="53.51916" fill="#45526c" />
                        <path
                            d="M830.94449,651.87926,799.95041,514.23375V481.71227a8.0002,8.0002,0,0,0-8-8H762.25992V452.79918a7.99989,7.99989,0,0,0-8-8h-16a7.99988,7.99988,0,0,0-8,8v20.91309H700.56943a8.0002,8.0002,0,0,0-8,8V652.79918a7.96814,7.96814,0,0,0,.58429,2.99268,7.83428,7.83428,0,0,0,7.37713,6.20654L825.95535,666.18C833.4512,666.37682,836.85245,656.62779,830.94449,651.87926Z"
                            transform="translate(-137.87214 -184.7043)" fill="#2f2e41" />
                        <path
                            d="M748.60294,399.4608c-3.30567-.09277-7.41993-.208-10.58887-2.52344a8.13148,8.13148,0,0,1-3.2002-6.07031,5.47132,5.47132,0,0,1,1.86035-4.49512c1.65723-1.39843,4.07618-1.72558,6.67774-.96093l-2.69922-19.72657,1.98242-.27148,3.17188,23.19043-1.6543-.75879c-1.91895-.88086-4.55176-1.32812-6.1875.05469a3.51336,3.51336,0,0,0-1.15234,2.89648,6.14335,6.14335,0,0,0,2.38086,4.52637c2.46679,1.80176,5.74609,2.03516,9.46582,2.13867Z"
                            transform="translate(-137.87214 -184.7043)" fill="#2f2e41" />
                        <rect x="582.21028" y="182.68229" width="10.77148" height="2" fill="#2f2e41" />
                        <rect x="616.21028" y="182.68229" width="10.77148" height="2" fill="#2f2e41" />
                        <path
                            d="M701.2213,345.85375c-9.5066-5.76148-13.98372-16.69081-13.992-27.50019a39.63722,39.63722,0,0,1,14.0122-30.27526c9.79165-8.46851,22.83139-12.61284,35.57037-13.66587,15.41314-1.27407,30.726,2.07612,45.44561,6.35205,15.76132,4.57855,31.20521,10.3394,47.33916,13.54478,15.65648,3.11052,31.35415,3.41726,46.76828-1.0808,14.22686-4.15159,28.66778-11.48765,43.86373-10.2163,13.12473,1.09807,23.092,9.83219,29.797,20.623,13.3117,21.4236,14.36311,50.17839,33.50653,68.01847,8.277,7.71346,19.05952,11.20764,29.83643,13.81931,10.334,2.50434,21.35767,4.10892,30.84067,9.17715,10.16871,5.43472,16.32466,15.64966,14.73384,27.3543-1.80681,13.29371-11.26648,24.7352-21.68129,32.54466A91.7308,91.7308,0,0,1,959.86755,469.675c-27.63238-7.33068-50.0878-28.74617-79.52754-30.08822-16.42351-.74869-32.59413,3.72561-49.01532,2.98373-11.38058-.51415-23.6301-4.72154-31.5567-13.1851a24.70886,24.70886,0,0,1-6.75688-14.53719c-.17935-1.90565-3.18111-1.92437-3,0,1.12531,11.95692,9.92656,20.78875,20.43,25.64427a56.35532,56.35532,0,0,0,17.4797,4.8121c8.03605.88756,16.22905.04793,24.22831-.82906,8.455-.927,16.924-2.06875,25.44779-1.96661a72.73989,72.73989,0,0,1,22.83729,4.06146c14.10562,4.838,26.81283,12.86479,40.28825,19.11627,13.04225,6.05051,26.69986,9.8018,41.14564,9.89485a96.211,96.211,0,0,0,40.36761-8.65716c12.47778-5.68433,24.20328-14.16938,31.97215-25.60781,7.28389-10.72436,11.10815-24.79317,4.55309-36.79916-5.13765-9.40992-14.93617-14.17174-24.81595-17.1034-10.95224-3.2499-22.399-4.73427-33.1198-8.78141a45.59328,45.59328,0,0,1-15.17179-9.10021,57.00307,57.00307,0,0,1-11.531-15.91091c-6.13768-11.97309-9.27378-25.12326-14.44276-37.49049-4.788-11.4558-11.34014-23.0022-21.8937-30.06219a37.24444,37.24444,0,0,0-19.05741-6.15172c-7.51773-.34-14.98848,1.38578-22.13353,3.56055-7.561,2.30137-14.93941,5.17585-22.55755,7.29394a81.67171,81.67171,0,0,1-24.66881,2.94615c-17.122-.55786-33.6618-5.6441-49.87113-10.77223-28.39559-8.98348-59.976-18.60067-88.52459-4.75306-11.12369,5.39559-20.546,14.44825-24.51851,26.33536-3.515,10.51812-3.0293,22.787,2.38964,32.58624a30.45529,30.45529,0,0,0,10.86307,11.33016c1.6554,1.00326,3.16488-1.59,1.51416-2.59041Z"
                            transform="translate(-137.87214 -184.7043)" fill="#2f2e41" />
                        <path
                            d="M783.96036,613.29869H769.20059a6.50753,6.50753,0,0,1-6.5-6.5V521.54381a6.50753,6.50753,0,0,1,6.5-6.5h14.75977a6.50753,6.50753,0,0,1,6.5,6.5v85.25488A6.50753,6.50753,0,0,1,783.96036,613.29869Z"
                            transform="translate(-137.87214 -184.7043)" fill="#45526c" />
                        <path
                            d="M726.9884,332.61173a12.73586,12.73586,0,0,0,21.6586,7.20072l-2.50708-.6619a21.2049,21.2049,0,0,0,37.15165,4.39669c1.12959-1.56941-1.47153-3.0687-2.59041-1.51416a18.20993,18.20993,0,0,1-31.6684-3.68,1.52213,1.52213,0,0,0-2.50708-.6619,9.75815,9.75815,0,0,1-16.64444-5.87692c-.26768-1.90385-3.15875-1.09378-2.89284.79752Z"
                            transform="translate(-137.87214 -184.7043)" fill="#2f2e41" />
                        <path id="f6ad8881-531f-450f-af8c-ee430f91c944" data-name="Path 33"
                            d="M632.42429,545.597l-.31281.21207-5.80766-8.56676a5.99,5.99,0,0,0-8.3193-1.59685h0l-18.14991,12.30436a5.99,5.99,0,0,0-1.59685,8.3193l31.86134,46.998a5.99,5.99,0,0,0,8.31929,1.59685h0l18.14984-12.3043a5.99,5.99,0,0,0,1.59685-8.3193h0l-21.91969-32.33328.31281-.21207Z"
                            transform="translate(-137.87214 -184.7043)" fill="#3f3d56" />
                        <path id="fc886b53-8f7f-459a-8f46-dc88972f03c0" data-name="Path 34"
                            d="M619.35741,537.87l-2.29312,1.55457a2.05711,2.05711,0,0,1,.01391,3.41481l-10.06407,6.82273a2.05711,2.05711,0,0,1-3.16675-1.27707l-2.14211,1.4522a4.32985,4.32985,0,0,0-1.15428,6.01356h0l30.79331,45.42257a4.32984,4.32984,0,0,0,6.01355,1.15428h0l17.65162-11.96656a4.32985,4.32985,0,0,0,1.15428-6.01355h0l-30.79346-45.4228a4.32985,4.32985,0,0,0-6.01356-1.15427h0Z"
                            transform="translate(-137.87214 -184.7043)" fill="#fff" />
                    </svg>
                </div>
                <div class="col-12 col-md-6 col-lg-7 py-3 bg-light">
                    <div>
                        <div class="mb-4">
                            <label for="emailStudentField" class="form-label fw-600 fs-15 text-dark">Email address</label>
                            <input type="email" class="form-control rounded-0 border-style-dashed border-3 bg-light"
                                id="emailStudentField" aria-describedby="emailStudentField">
                            <div id="emailStudentField-msg" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-4">
                            <label for="passwordStudentField" class="form-label fw-600 fs-15 text-dark">Password</label>
                            <input type="password" class="form-control rounded-0 border-style-dashed border-3 bg-light"
                                id="passwordStudentField" aria-describedby="passwordStudentField">
                            <div id="passwordStudentField-msg" class="form-text text-danger"></div>
                        </div>
                        <div>
                            <a href="{{ env('APP_URL') }}/forgot-password"
                                class="text-dark fw-500 fs-15 text-decoration-none">Forgot Password ?</a>
                        </div>
                        <div class="btn-group">
                            <button id="studentLoginBtn" type="submit"
                                class="btn btn-outline-dark rounded-0 fw-500 px-3 mt-4 me-3">Login</button>
                            <!-- 
                                <a href="#" class="btn btn-outline-dark rounded-0 fw-500 mt-4">
                                    <svg class="me-2" width="20" height="20" enable-background="new 0 0 128 128"
                                        id="Social_Icons" version="1.1" viewBox="0 0 128 128" xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="_x31__stroke">
                                            <g id="Google">
                                                <rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="128"
                                                    width="128" />
                                                <path clip-rule="evenodd"
                                                    d="M27.585,64c0-4.157,0.69-8.143,1.923-11.881L7.938,35.648    C3.734,44.183,1.366,53.801,1.366,64c0,10.191,2.366,19.802,6.563,28.332l21.558-16.503C28.266,72.108,27.585,68.137,27.585,64"
                                                    fill="#FBBC05" fill-rule="evenodd" />
                                                <path clip-rule="evenodd"
                                                    d="M65.457,26.182c9.031,0,17.188,3.2,23.597,8.436L107.698,16    C96.337,6.109,81.771,0,65.457,0C40.129,0,18.361,14.484,7.938,35.648l21.569,16.471C34.477,37.033,48.644,26.182,65.457,26.182"
                                                    fill="#EA4335" fill-rule="evenodd" />
                                                <path clip-rule="evenodd"
                                                    d="M65.457,101.818c-16.812,0-30.979-10.851-35.949-25.937    L7.938,92.349C18.361,113.516,40.129,128,65.457,128c15.632,0,30.557-5.551,41.758-15.951L86.741,96.221    C80.964,99.86,73.689,101.818,65.457,101.818"
                                                    fill="#34A853" fill-rule="evenodd" />
                                                <path clip-rule="evenodd"
                                                    d="M126.634,64c0-3.782-0.583-7.855-1.457-11.636H65.457v24.727    h34.376c-1.719,8.431-6.397,14.912-13.092,19.13l20.474,15.828C118.981,101.129,126.634,84.861,126.634,64"
                                                    fill="#4285F4" fill-rule="evenodd" />
                                            </g>
                                        </g>
                                    </svg>
                                    Login With Google
                                </a>
                            -->
                        </div>
                        <div class="mt-4">
                            <a href="{{ env('APP_URL') }}/signup"
                                class="text-dark fw-500 fs-15 text-decoration-none">Don't have an account then
                                <strong>Signup Now</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <livewire:login-logic-livewire-component :userrole=1 />
@stop
@section('script')
@stop
