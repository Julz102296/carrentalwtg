@extends('frontend.main_master')
@section('main')

  <!-- Inner Banner -->
  <div class="inner-banner inner-bg9">
    <div class="container">
        <div class="inner-title">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>Cars</li>
            </ul>
            <h3>Cars</h3>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Room Area -->
<div class="room-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">CARS</span>
            <h2>Our Car & Rates</h2>
        </div>
        <div class="row pt-45">
            <?php $empty_array = []; ?>
           
           @foreach ($cars as $item)

           @php
               $bookings = App\Models\Booking::withCount('assign_cars')->whereIn('id',$check_date_booking_ids)->where('cars_id',$item->id)->get()->toArray();

            $total_book_car = array_sum(array_column($bookings,'assign_cars_count'));

            $av_car = @$item->car_numbers_count-$total_book_car;

           @endphp



            @if ($av_car > 0 && old('capacity') <= $item->total_capacity)
                
            <div class="col-lg-4 col-md-6">
                <div class="room-card">
                    <a href="{{ route('search_car_details',$item->id.'?pickup='.old('pickup').'&return='.old('return').'&capacity='.old('capacity'))}}">
                        <img src="{{ asset( 'upload/carimg/'.$item->image ) }}" alt="Images" style="width: 550px; height:300px;">
                    </a>
                    <div class="content">
                        <h6>
  <a href="{{ route('search_car_details',$item->id.'?pickup='.old('pickup').'&return='.old('return').'&capacity='.old('capacity'))}}">{{ $item['type']['name'] }}</a></h6>
                        <ul>
                            <li class="text-color">P {{ $item->price }}</li>
                            <li class="text-color">Per Day</li>
                        </ul>
                        <div class="rating text-color">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star-half'></i>
                        </div>
                    </div>
                </div>
            </div> 

            @else
            <?php array_push($empty_array, $item->id) ?>

            @endif 
           @endforeach

           @if (count($cars) == count($empty_array))
           <p class="text-center text-danger">Sorry No Data Found</p>
               
           @endif

        
        </div>
    </div>
</div>
<!-- Room Area End -->






@endsection