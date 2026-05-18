                <div class="d-none d-sm-none d-md-block desktopmenu">
                    <ul class="list-unstyled d-flex flex-row flex-wrap mt-4 mb-5 display-block">
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/beat-my-price') }}" class="text-decoration-none custome-li-alignments">Beat
                                My Price</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/umrah-packages') }}"
                                class="text-decoration-none custome-li-alignments">Umrah
                                Packages</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/hajj-packages') }}" class="text-decoration-none custome-li-alignments">Hajj
                                Packages</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/ramadan-umrah-packages') }}"
                                class="text-decoration-none custome-li-alignments">Ramadan Packages</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/blog') }}" class="text-decoration-none custome-li-alignments">Blogs</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2 position-relative">
                            <a href="{{ url('/saved-packages') }}" class="text-decoration-none custome-li-alignments">
                                My Saved
                                <i class="far fa-heart ms-1"></i>
                                @php
                                    $favorites = json_decode(Cookie::get('favorites', '[]'), true);
                                @endphp
                                <span id="iconcount" class="iconcount">{{ count($favorites) }}</span>
                            </a>
                        </li>
                    </ul>
                </div>


                <div class="d-none d-sm-none d-md-none position-fixed desktopmenufixed">
                    <ul class="list-unstyled d-flex flex-row flex-wrap display-block">
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/beat-my-price') }}"
                                class="text-decoration-none custome-li-alignments">Beat
                                My Price</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/umrah-packages') }}"
                                class="text-decoration-none custome-li-alignments">Umrah
                                Packages</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/hajj-packages') }}"
                                class="text-decoration-none custome-li-alignments">Hajj
                                Packages</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/ramadan-umrah-packages') }}"
                                class="text-decoration-none custome-li-alignments">Ramadan Packages</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2">
                            <a href="{{ url('/blog') }}" class="text-decoration-none custome-li-alignments">Blogs</a>
                        </li>
                        <li class="me-xxl-4 me-xl-3 me-lg-2 me-md-2 position-relative">
                            <a href="{{ url('/saved-packages') }}" class="text-decoration-none custome-li-alignments">
                                My Saved
                                <i class="far fa-heart ms-1"></i>
                                <span id="iconcount" class="iconcount">{{ count($favorites) }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
