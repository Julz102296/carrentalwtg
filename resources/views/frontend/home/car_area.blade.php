@php
    $car = App\Models\Car::latest()->limit(4)->get();
@endphp

<div class="room-area pt-100 pb-70 section-bg" style="background-color:#ffffff">
  <div class="container">
      <div class="section-title text-center">
          <span class="sp-color">LOREM IPSUM</span>
          <h2>Our Car Rates</h2>
      </div>
      <div class="row pt-45">

        @foreach ($car as $item)
            
        

          <div class="col-lg-6">
              <div class="room-card-two">
                  <div class="row align-items-center">
                      <div class="col-lg-5 col-md-4 p-0">
                          <div class="room-card-img">
                              <a href="room-details.html">
                                  <img src="{{asset('upload/carimg/'.$item->image)}}" alt="Images">
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-7 col-md-8 p-0">
                          <div class="room-card-content">
                               <h3>
                                   <a href="room-details.html">{{ $item['type']['name'] }}</a>
                                   
                              </h3>
                              <h4>{{ $item->brand }}</h4>
                              <h6>{{ $item->model }}</h6>
                              <span>{{ $item->price }}/ Day </span>
                              <div class="rating">
                                  <i class='bx bxs-star'></i>
                                  <i class='bx bxs-star'></i>
                                  <i class='bx bxs-star'></i>
                                  <i class='bx bxs-star'></i>
                                  <i class='bx bxs-star'></i>
                              </div>
                              <p>Lorem ipsum dolor sit amet, adipiscing elit. Suspendisse et faucibus felis, sed pulvinar purus.</p>
                              <ul>
                                  <li>{{ $item->capacity }}</li>
                              </ul>

                              <ul>
                                  <li>{{ $item->capacity }}</li>
                                  <li>Gas</li>
                              </ul>

                              <a href="room-details.html" class="book-more-btn">
                                  Book Now
                              </a>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
          @endforeach

          </div>
      </div>
  </div>
</div>