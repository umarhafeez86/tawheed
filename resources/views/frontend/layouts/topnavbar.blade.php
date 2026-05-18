            @php
                use App\Models\Services;
            @endphp
            <div class="background-color header float-start">
                <div class="container d-none d-sm-none d-md-block">
                    <ul
                        class="list-unstyled d-flex flex-row flex-wrap align-items-center justify-content-between mt-4 mb-4 gap-0 text-decoration-none
                            px-lg-3">
                        <li class="nav-item"><a href="{{ url('') }}" class="nav-link custome-li-alignments">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle custome-li-alignments" href="#"
                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Umrah Packages
                                <img src="{{ asset('frontend/assets/images/chevron-down.svg') }}" class="down-icon"
                                    alt="">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @php
                                    $servicedetails = Services::where('services_status', 1)
                                        ->orderBy('services_sort', 'asc')
                                        ->get();
                                @endphp
                                @if ($servicedetails->count() > 0)
                                    @foreach ($servicedetails as $servicedetail)
                                        <li><a class="dropdown-item"
                                                href="{{ url('/' . $servicedetail->services_url) }}">{{ $servicedetail->services_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/hajj-packages') }}" class="nav-link custome-li-alignments">
                                Hajj Packages 2025
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/umrah-and-holiday-packages') }}" class="nav-link custome-li-alignments">
                                Umrah and Holiday
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle custome-li-alignments" href="#"
                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Important Links

                                <img src="{{ asset('frontend/assets/images/chevron-down.svg') }}" class="down-icon"
                                    alt="">

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @php
                                    use App\Models\Staticpages;
                                    $staticpages = Staticpages::where('pages_status', 1)
                                        ->where('pages_status_header', 1)
                                        ->orderBy('pages_sort', 'asc')
                                        ->get();
                                @endphp
                                @if ($staticpages->count() > 0)
                                    @foreach ($staticpages as $staticpage)
                                        <li><a href="{{ url('/information/' . $staticpage->pages_url) }}"
                                                class="dropdown-item">{{ $staticpage->pages_name }}</a></li>
                                    @endforeach
                                @endif
                        </li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/information/contact-us') }}" class="nav-link custome-li-alignments">
                            Contact us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/beat-my-price') }}" class="nav-link custome-li-alignments">
                            Beat My Price
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="d-block d-sm-block d-md-none">
                <div class="background-color">
                    <div class="container mt-0 mb-4 p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <li class="list-unstyled mb-0">
                                <a href="{{ url('') }}"
                                    class="hover-underline custome-li-alignments ms-2 ms-lg-4">Home</a>
                            </li>
                            <button class="btn p-0 border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <img src="{{ asset('frontend/assets/images/menu.svg') }}" alt="Menu Icon" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            <a href="{{ url('') }}">
                                <img src="{{ asset('frontend/assets/images/logoformenu.jpg') }}" alt="Logo">
                            </a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page" href="{{ url('') }}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Umrah Packages <img src="{{ asset('frontend/assets/images/chevron-down-2.svg') }}"
                                        class="down-icon" alt="">
                                </a>
                                <ul class="dropdown-menu w-100 p-0 m-0 position-static"
                                    style="translate3d(0px, 0px, 0px)">
                                    @php
                                        $servicedetails = Services::where('services_status', 1)
                                            ->orderBy('services_sort', 'asc')
                                            ->get();
                                    @endphp
                                    @if ($servicedetails->count() > 0)
                                        @foreach ($servicedetails as $servicedetail)
                                            <li><a class="dropdown-item nav-link"
                                                    href="{{ url('/' . $servicedetail->services_url) }}">{{ $servicedetail->services_name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/hajj-packages') }}">Hajj Packages 2025</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/umrah-and-holiday-packages') }}">Umrah and Holiday</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Important Links <img src="{{ asset('frontend/assets/images/chevron-down-2.svg') }}"
                                        class="down-icon" alt="">
                                </a>
                                <ul class="dropdown-menu w-100 p-0 m-0 position-static"
                                    style="translate3d(0px, 0px, 0px)">
                                    @php
                                        $staticpages = Staticpages::where('pages_status', 1)
                                            ->where('pages_status_header', 1)
                                            ->orderBy('pages_sort', 'asc')
                                            ->get();
                                    @endphp
                                    @if ($staticpages->count() > 0)
                                        @foreach ($staticpages as $staticpage)
                                            <li><a href="{{ url('/information/' . $staticpage->pages_url) }}"
                                                    class="dropdown-item nav-link">{{ $staticpage->pages_name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/information/contact-us') }}">Contact us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/beat-my-price') }}">Beat My Price</a>
                            </li>

                        </ul>



                    </div>
                </div>

            </div>
            <div class="clearfix"></div>