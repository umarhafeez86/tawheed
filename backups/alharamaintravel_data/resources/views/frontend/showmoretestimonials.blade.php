      @foreach ($testimonials as $testimonial)
      <div class="col-12 float-start mb-4">  
        <img src="{{ asset('uploads/testimonials/' . $testimonial->testimonials_image) }}" class="img-fluid" alt="...">
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      @endforeach