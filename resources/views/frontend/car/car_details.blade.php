@extends('frontend.main_master')
@section('main')
  <!-- Inner Banner -->
  <div class="inner-banner inner-bg10">
    <div class="container">
        <div class="inner-title">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>Car Details </li>
            </ul>
            <h3>{{ $cardetails->type->name }}</h3>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Room Details Area End -->
<div class="room-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="room-details-side">
                    <div class="side-bar-form">
                        <h3>Booking Sheet </h3>
                        <form>
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Pickup Date</label>
                                        <div class="input-group">
<input id="datetimepicker" type="text" class="form-control" placeholder="00/00/2024">
                                            <span class="input-group-addon"></span>
                                        </div>
                                        <i class='bx bxs-calendar'></i>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Return Date</label>
                                        <div class="input-group">
<input id="datetimepicker-check" type="text" class="form-control" placeholder="00/00/2024">
                                            <span class="input-group-addon"></span>
                                        </div>
                                        <i class='bx bxs-calendar'></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Numbers of Passenger</label>
                                        <select class="form-control">
                                            <option>01</option>
                                            <option>02</option>
                                            <option>03</option>
                                            <option>04</option>
                                            <option>05</option>
                                        </select>	
                                    </div>
                                </div>
                            


    
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                        Book Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                  
                </div>
            </div>

            <div class="col-lg-8">
                <div class="room-details-article">

                    <div class="room-details-item">
                      <img src="{{asset('upload/carimg/'.$cardetails->image)}}" alt="Images" style="width: 450px; height:500px;">
                    </div>




                    <div class="room-details-title">
                        <h2>{{ $cardetails->type->name }}</h2>
                        <b><h4>{{ $cardetails->brand }} | {{ $cardetails->model }}</h4></b>
                        <ul>
                            
                            <li>
                               <b>{{ $cardetails->price }} / Day</b>
                            </li> 
                         
                        </ul>
                    </div>

                    <div class="room-details-content">
                        <p>
                            {!! $cardetails->description !!}
                        </p>


<div class="row"> 
<div class="col-lg-6">



<div class="services-bar-widget">
                        <h3 class="title">Car Details </h3>
<div class="side-bar-list">
    <ul>
       <li>
            <a href="#"> <b>Brand : </b> {{ $cardetails->brand }} <i class='bx bxs-cloud-download'></i></a>
        </li>
        <li>
          <a href="#"> <b>Model : </b> {{ $cardetails->model }} <i class='bx bxs-cloud-download'></i></a>
      </li>
        <li>
             <a href="#"> <b>Size | Dimension : </b> {{ $cardetails->size }}<i class='bx bxs-cloud-download'></i></a>
        </li>
        <li>
          <a href="#"> <b>Capacity : </b> {{ $cardetails->capacity }} <i class='bx bxs-cloud-download'></i></a>
        </li>
    </ul>
</div>
</div>


<div class="side-bar-plan">
  <h3>Addons</h3>
  <ul>
      @foreach ($addons as $fac) 
      <li><a href="#">{{ $fac->addons_name }}</a></li>
      @endforeach
  </ul>   
</div>

</div>




                </div>



                    </div>

                    <div class="room-details-review">
                        <h2>Clients Review and Retting's</h2>
                        <div class="review-ratting">
                            <h3>Your retting: </h3>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <form >
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control"  cols="30" rows="8" required data-error="Write your message" placeholder="Write your review here.... "></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn btn-bg-three">
                                        Submit Review
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Room Details Area End -->

<!-- Room Details Other -->
<div class="room-details-other pb-70">
    <div class="container">
        <div class="room-details-text">
            <h2>Other Cars</h2>
        </div>

        <div class="row ">
           
           @foreach ($otherCars as $item)
            <div class="col-lg-6">
                <div class="room-card-two">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-4 p-0">
                            <div class="room-card-img">
                                <a href="{{ url('car/details/'.$item->id) }}">
                                    <img src="{{ asset( 'upload/carimg/'.$item->image ) }}" alt="Images" style="width: 450px; height:300px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-8 p-0">
                            <div class="room-card-content">
                                 <h3>
             <a href="{{ url('car/details/'.$item->id) }}">{{ $item['type']['name'] }}</a>
                                </h3>
                                <span>{{ $item->price }} / Day </span>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                                <p>{{ $item->description }}</p>
                                <ul>
                   <li><i class='bx bx-user'></i> {{ $item->capacity }}</li>
                   <li><i class='bx bx-expand'></i> {{ $item->size }}</li>
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
<!-- Room Details Other End -->




@endsection