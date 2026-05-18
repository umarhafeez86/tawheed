@extends('frontend.layouts.main')

@section('main-container')

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
            <h2 class="breadcrumb-title">{{ $page_title }}</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{ $page_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="specialities-section-one">
    <div class="container">
        <div class="row">
@php
use App\Models\Services;
$servicedetails = Services::where('services_status',1)->orderBy('services_sort','asc')->get();
@endphp
@if ($servicedetails->count() > 0)
@foreach ($servicedetails as $servicedetail)
            <div class="col-lg-3 col-sm-6 col-12 aos p-2" data-aos="fade-up">
                <a href="{{ url('/services/'.$servicedetail->services_url ) }}">
                <div class="specialities-item-page">
                    <div class="specialities-img-page">
                        <span><img src="{{ asset('uploads/services/'.$servicedetail->services_image) }}" alt="{{ $servicedetail->services_name }}"></span>
                    </div>
                    <h3>{{ $servicedetail->services_name }}</h3>
                    <p>{!! strlen($servicedetail->services_details) > 100 ? substr($servicedetail->services_details, 0, 100) . '...' : $servicedetail->servicedetail !!}</p>
                </div>
                </a>
            </div>
@endforeach
@endif
        </div>
    </div>
</section>
@endsection