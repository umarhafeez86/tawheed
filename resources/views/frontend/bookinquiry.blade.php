@extends('frontend.layouts.inner2')
@section('main-container')
<div class="container-fluid display-b">
    <div class="row ">
        <div class="col-lg-6 background-image position-relative ">
            <h3 class="Logo mt-4"><img src="{{ asset('uploads/settings/'.get_siteinfo('header_logo')) }}" alt="{{ get_siteinfo('setting_name') }}"></h3>
            <div class=" text-center  text-center text-white custome-margin-top-150px">
                <h2 class="devine-journy">Send Enquiry</h2>
                <p class="makkah-p ">Makkah Madina</p>
                        <div class="buttons-background  align-items-center mt-4">
                                <div class="radio-group mx-auto" id="customRadio">
                                    <div class="radio-box" id="radioBox"></div>
                                    <label class="radio-label @if ($packagetype=="Umrah") active @endif">
                                        <input type="radio" name="packagetype" value="Umrah" @if ($packagetype=="Umrah") checked @endif>
                                        Umrah
                                    </label>
                                    <label class="radio-label @if ($packagetype=="Hajj") active @endif">
                                        <input type="radio" name="packagetype" value="Hajj" @if ($packagetype=="Hajj") checked @endif>
                                        Hajj
                                    </label>
                                </div>
                                <button type="submit" class="book-pakage">Book A Package</button>
                        </div>


            </div>
            <span class="phone-no text-center d-block custome-margin-top-100px"><a href="tel:{{ str_replace(' ', '',get_siteinfo('setting_phone')) }}" target="_blank">{{ get_siteinfo('setting_phone') }}</a></span>
        </div>



       








        <div class="col-lg-6 background-color">

            <div class="container  me-4 mt-4 ">
                <ul class="list-unstyled d-flex flex-wrap   justify-content-between mt-4 ms-5 me-5 gap-3">

                    <li><a href="#" class="text-decoration-none  custome-li-alignments ms-4">Send
                            Enquiry</a></li>
                    <li><a href="#" class="text-decoration-none  custome-li-umrah ">Umrah
                            Packages</a>
                    </li>
                    <li><a href="#" class="text-decoration-none  custome-li-alignments ">Hajj
                            Packages
                        </a></li>
                    <li><a href="#" class="text-decoration-none  custome-li-alignments ">Ramadan</a>
                    </li>
                    <li class=" me-3"><a href="#" class="text-decoration-none  custome-li-alignments ">Blogs</a>
                    </li>
                </ul>


                <div class="container ms-4 me-4 mt-4">
                    <form class="col-12 float-start" id="bookform" name="bookform" action="{{ url('/book-inquiry-submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="custome-margin-top-100px">
                            <h2 class="book-umrah">Book {{ $packagetype }}</h2>
                            <p class="book-umrah-p">We help you visit Holy Kabah with you customized plan</p>
                        </div>
                        <div>
                                <input type="hidden" name="packagetype" id="packagetype" value="{{ $packagetype }}">
                                <div class="mb-3 mt-lg-5">
                                    <label for="txtname" class="form-label text-white">Full Name</label>
                                    <input type="text" name="txtname" id="txtname" class="form-control @error("txtname") is-invalid @enderror" placeholder="Full name" value="{{ old("txtname") }}" required >
                                    @error("txtname")
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-lg-5">
                                    <label for="txtphone" class="form-label text-white">Contact Number</label>
                                    <input type="text" name="txtphone" id="txtphone" class="form-control @error("txtphone") is-invalid @enderror" placeholder="+44" value="{{ old("txtphone") }}" required>
                                    @error("txtphone")
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-lg-5">
                                    <label for="txtemail" class="form-label text-white">Email Address</label>
                                    <input type="email" name="txtemail" id="txtemail" class="form-control @error("txtemail") is-invalid @enderror" placeholder="demo@123" value="{{ old("txtemail") }}" required>
                                    @error("txtemail")
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row mt-lg-5">
                                    <div class="mb-3 col-lg-3">
                                        <label for="travelmonth" class="form-label text-white">Months</label>
                                        <select class="form-control @error("travelmonth") is-invalid @enderror" name="travelmonth" id="travelmonth" required>
                                            <option value="">-- Select A Travel Month ---</option>
                                            <option value="January" {{ old('travelmonth') == 'January' ? 'selected' : '' }}>January</option>
                                            <option value="February" {{ old('travelmonth') == 'February' ? 'selected' : '' }}>February</option>
                                            <option value="March" {{ old('travelmonth') == 'March' ? 'selected' : '' }}>March</option>
                                            <option value="April" {{ old('travelmonth') == 'April' ? 'selected' : '' }}>April</option>
                                            <option value="May" {{ old('travelmonth') == 'May' ? 'selected' : '' }}>May</option>
                                            <option value="June"  {{ old('travelmonth') == 'June' ? 'selected' : '' }}>June</option>
                                            <option value="July"  {{ old('travelmonth') == 'July' ? 'selected' : '' }}>July</option>
                                            <option value="August"  {{ old('travelmonth') == 'August' ? 'selected' : '' }}>August</option>
                                            <option value="September" {{ old('travelmonth') == 'September' ? 'selected' : '' }}>September</option>
                                            <option value="October" {{ old('travelmonth') == 'October' ? 'selected' : '' }}>October</option>
                                            <option value="November" {{ old('travelmonth') == 'November' ? 'selected' : '' }}>November</option>
                                            <option value="December" {{ old('travelmonth') == 'December' ? 'selected' : '' }}>December</option>
                                    </select>
                                    @error("travelmonth")
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label for="nightsinfo" class="form-label text-white">Days</label>
                                        <input type="number" name="nightsinfo" id="nightsinfo" class="form-control" placeholder="days">
                                        @error("nightsinfo")
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label for="passginfo" class="form-label text-white">No of guests</label>
                                        <input type="number" name="passginfo" id="passginfo" class="form-control" placeholder="no of guests">
                                        @error("passginfo")
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                        </div>
                        <button type="submit" class="enquire-now mt-5 mb-4">ENQUIRE NOW</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="d backround-image display-n">
    <div class="">
        <div class="  ">
            <div class=" ">
                <div class="row">
                    <h3 class="Logo">Logo</h3>
                </div>
                <hr class="line">
                <div class="">
                    <nav class="navbar  fixed-top">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">
                                <p class="phone-no-company">UAN <span class="phone-no">00 000 0000</span></p>
                            </a>
                            <div>
                                <img src="../assets/images/wattsapp-image.svg" class="wattsapp-icon me-3" alt="">
                                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#navbarMenuLarge" aria-controls="offcanvasNavbar"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarMenuLarge"
                                aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Know More About Us</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
    
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Send Enquiry</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Umrah Packages</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Hajj Packages</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#">Ramadan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Blogs</a>
                                        </li>
                                    </ul>
    
                                </div>
                            </div>
    
                        </div>
                    </nav>
    
                </div>
                <p class="devine-journy">Send Enquiry</p>
            </div>

            <div class="background-color p-5">
                <div class="">
                    <h2 class="book-umrah">Book Umrah</h2>
                    <p class="book-umrah-p">We help you visit Holy Kabah with you customized plan</p>

                </div>
                <form class="">


                    <div class="mb-3 mt-lg-5">
                        <label for="exampleInputEmail1" class="form-label text-white">Enter Your
                            Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Full name">

                    </div>

                    <div class="mb-3 mt-lg-5">
                        <label for="exampleInputEmail1" class="form-label text-white">Contact no</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="+92">

                    </div>



                    <div class="mb-3 mt-lg-5">
                        <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="demo@123">

                    </div>


                    <div class="row mt-lg-5">
                        <div class="mb-3 col-lg-3">
                            <label for="exampleInputEmail1" class="form-label text-white">Months</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="months">

                        </div>
                        <div class="mb-3 col-lg-4">
                            <label for="exampleInputEmail1" class="form-label text-white">Days</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="days">

                        </div>
                        <div class="mb-3 col-lg-4">
                            <label for="exampleInputEmail1" class="form-label text-white">No of
                                guests</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="no of guests">

                        </div>

                    </div>
                </form>
                <button class="enquire-now mt-5 mb-4">ENQUIRE NOW</button>
            </div>

        </div>


    </div>
</div>

@endsection