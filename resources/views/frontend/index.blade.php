 @extends('frontend.main_master')
 @section('main')
     
 <!-- Banner Area -->
 <div class="banner-area" style="height: 480px;">
  <div class="container">
      <div class="banner-content">
          <h1 style="color: white">Reach your destination safe and on time!</h1>
          
           
      </div>
  </div>
</div>
<!-- Banner Area End -->

<!-- Banner Form Area -->
<div class="banner-form-area">
  <div class="container">
      <div class="banner-form">
          <form method="get" action="{{ route('booking.search') }}">
              <div class="row align-items-center">
                  <div class="col-lg-3 col-md-3">
                      <div class="form-group">
                          <label>PICK-UP DATE</label>
                          <div class="input-group">
<input autocomplete="off" type="text" required name="pickup" class="form-control dt_picker" placeholder="yyyy-mm-dd">
                              <span class="input-group-addon"></span>
                          </div>	
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-3">
                      <div class="form-group">
                          <label>RETURN DATE</label>
                          <div class="input-group">
<input autocomplete="off" type="text" required name="return" class="form-control dt_picker" placeholder="yyyy-mm-dd">
                              <span class="input-group-addon"></span>
                          </div>	
                      </div>
                  </div>

                  <div class="col-lg-2 col-md-2">
                    <div class="form-group">
                        <label>PASSENGER</label>
                        <select name="capacity" class="form-control">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                        </select>	
                    </div>
                </div>

                  <div class="col-lg-4 col-md-4">
                      <button type="submit" class="default-btn btn-bg-one border-radius-5">
                          Search
                      </button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>
<!-- Banner Form Area End -->

<!-- Car Area -->
@include('frontend.home.car_area')
<!-- Car Area End -->

<!-- Car Area Two-->
@include('frontend.home.car_area_two')
<!-- Car Area Two End -->

<!-- Services Area Three -->
@include('frontend.home.services')
<!-- Services Area Three End -->

<!-- Team Area Three -->
@include('frontend.home.team')
<!-- Team Area Three End -->

<!-- Testimonials Area Three -->
@include('frontend.home.testimonials')
<!-- Testimonials Area Three End -->

<!-- FAQ Area -->
@include('frontend.home.faq')
<!-- FAQ Area End -->

<!-- Blog Area -->
@include('frontend.home.blog')
<!-- Blog Area End -->

@endsection