@extends('frontend.layouts.innerbeatmyprice')

@section('main-container')
    <h1 class="col-12 mt-4 page_heading float-start">Beat My Price</h1>
    <div class="clearfix"></div>
    <p class="page_sub_heading_text mb-5">We help you visit Holy Kabah with customized plan.</p>
    <div class="clearfix"></div>

    @if (Session::has('success'))
        <p
            style="background-color:#F8D49E;color:#000;border-radius:5px;text-align:center;padding: 5px 0px;text-transform:Capitalise;">
            {{ Session::get('success') }}</p>
    @endif

    <form id="estimateform" action="{{ url('/beat-my-price-process') }}" class="me-sm-4 me-4" method="post"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="packagetype" id="packagetype" value="Umrah">
        <div class="mb-3 mt-lg-2">
            <label for="personname" class="form-label text-white">Enter Your Name</label>
            <input type="text" class="form-control @error('personname') is-invalid @enderror" name="personname"
                id="personname" placeholder="Full name">
            @error('personname')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3 mt-lg-2">
            <label for="exampleInputEmail1" class="form-label text-white">Contact no</label>
            <input type="text" class="form-control @error('phoneno') is-invalid @enderror" name="phoneno" id="phoneno"
                placeholder="+44" value="+44" oninput="if(!this.value.startsWith('+44')) this.value = '+44';" maxlength="13" >
            @error('phoneno')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3 mt-lg-2">
            <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
            <input type="email" class="form-control @error('txtemail') is-invalid @enderror" name="txtemail"
                id="txtemail" placeholder="demo@123">
            @error('txtemail')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="row mt-lg-2">
            <div class="mb-1 col-lg-3">
                <label for="travelmonth" class="form-label text-white">Travel Month</label>
                <select class="form-control @error('travelmonth') is-invalid @enderror" name="travelmonth" id="travelmonth">
                    <option value="">-- Select A Month ---</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                @error('travelmonth')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-1 col-lg-4">
                <label for="nightsinfo" class="form-label text-white">Days</label>
                <input type="number" class="form-control @error('nightsinfo') is-invalid @enderror" id="nightsinfo"
                    name="nightsinfo" placeholder="days">
                @error('nightsinfo')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-1 col-lg-4">
                <label for="passginfo" class="form-label text-white">No of guests</label>
                <input type="number" class="form-control @error('passginfo') is-invalid @enderror" id="passginfo"
                    name="passginfo" placeholder="no of guests">
                @error('passginfo')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <button type="submit" class="enquire-now mt-5 mb-4">ENQUIRE NOW</button>

    </form>

    <div class="clearfix"></div>
@endsection
