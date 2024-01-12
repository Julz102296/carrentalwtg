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
            <h2>Our Cars & Rates</h2>
        </div>
        <div class="row pt-45">
           
           @foreach ($cars as $item)
            <div class="col-lg-4 col-md-6">
                <div class="room-card">
                    <a href="{{ url('car/details/'.$item->id) }}">
                        <img src="{{ asset( 'upload/carimg/'.$item->image ) }}" alt="Images" style="width: 550px; height:480px;">
                    </a>
                    <div class="content">
                        <h6><a href="{{ url('car/details/'.$item->id) }}">{{ $item['type']['name'] }}</a></h6>
                        <ul>
                            <li class="text-color">{{ $item->price }} / Per Day</li>
                            <li class="text-color">{{ $item->brand }}</li>
                            <li class="text-color">{{ $item->model }}</li>
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
           @endforeach

        
        </div>
    </div>
</div>
<!-- Room Area End -->






@endsection