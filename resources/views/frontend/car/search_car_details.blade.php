@extends('frontend.main_master')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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

<form action="{{ route('user_booking_store',$cardetails->id) }}" method="post" id="bk_form">
    @csrf
    
    <input type="hidden" name="car_id" value="{{ $cardetails->id }}">


    <div class="row align-items-center">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Pickup Date</label>
                <div class="input-group">
    <input autocomplete="off"  type="text" required name="pickup" id="pickup"  class="form-control dt_picker" value="{{ old('pickup') ? date('Y-m-d', strtotime(old('pickup'))) : '' }}" >
                    <span class="input-group-addon"></span>
                </div>
                <i class='bx bxs-calendar'></i>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label>Return Date</label>
                <div class="input-group">
   <input autocomplete="off"  type="text" required name="return" id="return"  class="form-control dt_picker" value="{{ old('return') ? date('Y-m-d', strtotime(old('return'))) : '' }}" >
                    <span class="input-group-addon"></span>
                </div>
                <i class='bx bxs-calendar'></i>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label>Numbers of Passenger</label>
                <select class="form-control" name="capacity" id="nmbr_person">
                @for ($i = 1; $i <= 4; $i++) 
      <option {{ old('capacity') == $i ? 'selected' : '' }} value="0{{ $i }}" >0{{ $i }} </option>
              @endfor
                </select>	
            </div>
        </div>

        <input type="hidden" id="total_adult" value="{{ $cardetails->total_adult }}">
        <input type="hidden" id="room_price" value="{{ $cardetails->price }}">
        <input type="hidden" id="discount_p" value="{{ $cardetails->discount }}">


     

        <div class="col-lg-12">
            <table class="table">
                
    <tbody>
        <tr> 
        <td><p> SubTotal</p></td>
        <td style="text-align: right" ><span class="t_subtotal">0</span> </td> 
        </tr>

        <tr> 
        <td><p> Discount</p></td>
        <td style="text-align: right" ><span class="t_discount">0</span></td> 
        </tr>

        <tr> 
        <td><p> Total</p></td>
        <td style="text-align: right" ><span class="t_g_total">0</span></td> 
        </tr>
        
    </tbody>
              </table>

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
                    






                    <div class="room-details-title">
                        <h2>{{ $cardetails->type->brand }}</h2>
                        <ul>
                            
                            <li>
                               <b> Basic : ${{ $cardetails->price }}/Day</b>
                            </li> 
                         
                        </ul>
                    </div>

                    <div class="room-details-content">
                        <p>
                            {!! $cardetails->description !!}
                        </p>




<div class="side-bar-plan">
                        <h3>Addons</h3>
                        <ul>
                            @foreach ($addons as $fac) 
                            <li><a href="#">{{ $fac->addons_name }}</a></li>
                            @endforeach
                        </ul>

                        
                    </div>







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
            <a href="#"> <b>Size : </b> {{ $cardetails->size }} <i class='bx bxs-cloud-download'></i></a>
       </li>
       <li>
        <a href="#"> <b>Capacity : </b> {{ $cardetails->capacity }} <i class='bx bxs-cloud-download'></i></a>
   </li>
         
    </ul>
</div>
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
            <h2>Other Car </h2>
        </div>

        <div class="row ">
           
           @foreach ($otherCars as $item)
            <div class="col-lg-6">
                <div class="room-card-two">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-4 p-0">
                            <div class="room-card-img">
                                <a href="{{ url('car/details/'.$item->id) }}">
                                    <img src="{{ asset( 'car/roomimg/'.$item->image ) }}" alt="Images">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-8 p-0">
                            <div class="room-card-content">
                                 <h3>
             <a href="{{ url('car/details/'.$item->id) }}">{{ $item['type']['name'] }}</a>
                                </h3>
                                <span>{{ $item->price }} / Per Day </span>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                                <p>{{ $item->description }}</p>
                                <ul>
                   <li><i class='bx bx-user'></i> {{ $item->capacity }} Person</li>
                   <li><i class='bx bx-expand'></i> {{ $item->size }}ft2</li>
                                </ul>

                                <ul>
        <li><i class='bx bx-show-alt'></i>{{ $item->brand }}</li>
        <li><i class='bx bxs-hotel'></i> {{ $item->model }}</li>
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

<script>
    $(document).ready(function () {
       var pickup = "{{ old('pickup') }}";
       var return = "{{ old('return') }}";
       var car_id = "{{ $car_id }}";
       if (pickup != '' && return != ''){
          getAvaility(pickup, return, car_id);
       }


       $("#return").on('change', function () {
          var return = $(this).val();
          var pickup = $("#pickup").val();

          if(check_in != '' && check_out != ''){
             getAvaility(pickup, return, car_id);
          }
       });

       $(".number_of_cars").on('change', function () {
          var return = $("#return").val();
          var pickup = $("#pickup").val();

          if(pickup != '' && return != ''){
             getAvaility(pickup, return, car_id);
          }
       });


    });



    function getAvaility(pickup, return, car_id) {
       $.ajax({
          url: "{{ route('check_car_availability') }}",
          data: {car_id:car_id, pickup:pickup, return:return},
          success: function(data){
             $(".available_car").html('Availability : <span class="text-success">'+data['available_car']+' Cars</span>');
             $("#available_car").val(data['available_car']);
             price_calculate(data['total_days']);
          }
       });
    }

    function price_calculate(total_days){
       var car_price = $("#car_price").val();
       var discount_p = $("#discount_p").val();
       var select_car = $("#select_car").val();

       var sub_total = car_price * total_days * parseInt(select_car);

       var discount_price = (parseInt(discount_p)/100)*sub_total;

       $(".t_subtotal").text(sub_total);
       $(".t_discount").text(discount_price);
       $(".t_g_total").text(sub_total-discount_price);

    }

    $("#bk_form").on('submit', function () {
       var av_car = $("#available_room").val();
       var select_car = $("#select_room").val();
       if (parseInt(select_carr) >  av_room){
          alert('Sorry, you select maximum number of room');
          return false;
       }
       var nmbr_person = $("#nmbr_person").val();
       var total_capacity = $("#total_capacity").val();
       if(parseInt(nmbr_person) > parseInt(total_capacity)){
          alert('Sorry, you select maximum number of person');
          return false;
       }

    })
 </script>


@endsection