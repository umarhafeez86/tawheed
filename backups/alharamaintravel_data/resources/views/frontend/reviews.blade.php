@extends('frontend.layouts.innerblog')

@section('main-container')
    <h1 class="col-12 mt-4 page_heading float-start">What our Pilgrims Say</h1>
    <div class="clearfix"></div>
    <p class="page_sub_heading_text mb-5">Haq Travels is an Excellent Rated Company. Look what our Customers are saying</p>
    <div class="clearfix"></div>

    <div class="col-12 m-0 p-0 float-start" id="blogsData">
      @foreach ($testimonials as $testimonial)
      <div class="col-12 float-start mb-4">  
        <img src="{{ asset('uploads/testimonials/' . $testimonial->testimonials_image) }}" class="img-fluid" alt="...">
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      @endforeach
    </div>
    <div class="clearfix"></div>

    <button id="load-more-testimonials" data-page="2" class="btn_showmore mb-5">Show more</button>
    <div class="clearfix"></div>
@endsection
