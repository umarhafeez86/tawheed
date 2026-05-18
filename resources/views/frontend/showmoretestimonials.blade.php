      @foreach ($testimonials as $testimonial)
          <div class="back-info col-12 float-start mt-5">
              <div class="px-lg-5  mt-5">
                  <div class="d-flex gap-4 align-items-start">
                      <div>
                          <img src="{{ url('frontend/assets/images/bluetooth.svg') }}" class="img-sm-md-fluid"
                              alt="">
                      </div>
                      <div>
                          <div class="d-flex gap-3 py-4">
                              <div>
                                  <img src="{{ asset('uploads/testimonials/' . $testimonial->testimonials_image) }}"
                                      class="img-sm-md-fluid" alt="">
                              </div>
                              <div>
                                  @for ($i = 1; $i <= $testimonial->testimonials_ratings; $i++)
                                      <i class="fa fa-star"></i>
                                  @endfor
                                  <p class="mt-2 testimonials-p me-4">
                                      {!! $testimonial->testimonials_details !!}
                                  </p>
                              </div>
                          </div>
                          <div class="d-flex align-items-center gap-3 mt-4 mb-5">
                              <a href="https://www.google.com/search?sca_esv=18541cb920c8cb9c&rlz=1C1VDKB_enPK1139PK1139&sxsrf=AE3TifOy8wNOnMCYB3OXEHhdu8ZkM5CGIQ:1751566488504&si=AMgyJEtREmoPL4P1I5IDCfuA8gybfVI2d5Uj7QMwYCZHKDZ-E-Hd7C24g78ZHNsvvO6hgcxhy1aaz7CSVnyhVY3I5FBaP6RzBqwlvBMxhLtgJb5ZsyVA0EWbmClBLhRc59dwpzPGUe9IVoMBZXLVJRF3OVrhVbWfbw%3D%3D&q=Al+Haramain+Travel+Reviews&sa=X&ved=2ahUKEwjY7uPSpaGOAxWa0AIHHUUQEg8Q0bkNegQIIhAE&biw=1920&bih=919&dpr=1" target="_blank">
                                  <img src="{{ url('frontend/assets/images/google-logo.png') }}" alt="">
                              </a>
                              <div class="">
                                  <h2 class="mb-0 testimonials-heading">
                                      {{ $testimonial->testimonials_name }}</h2>
                                  <p class="mb-0 testimonials-designation">
                                      {{ $testimonial->testimonials_location }}</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="clearfix"></div>
      @endforeach
