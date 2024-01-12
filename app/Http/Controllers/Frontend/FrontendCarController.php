<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookArea;
use App\Models\Addon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Car;
use App\Models\CarsBooksDates;
use App\Models\Booking;


class FrontendCarController extends Controller
{
    public function AllFrontendCarList()
        {
            $cars = Car::latest()->get();
            return view('frontend.car.all_car', compact('cars'));
        } // End Method

    public function CarDetailsPage($id){

            $cardetails = Car::find($id);
            $addons = Addon::where('cars_id',$id)->get();
    
            $otherCars = Car::where('id','!=', $id)->orderBy('id','DESC')->limit(2)->get();
            return view('frontend.car.car_details',compact('cardetails','addons','otherCars'));
    
        } // End Method 

    public function BookingSearch(Request $request)
        {
            $request->flash();

            if($request->pickup == $request->return){

                    $notification = array(
                        'message' => 'Please Select Another Date',
                        'alert-type' => 'error'
                    );
        
                    return redirect()->back()->with($notification);
            }

            $sdate = date('Y-m-d', strtotime($request->pickup));
            $edate = date('Y-m-d', strtotime($request->return));
            $alldate = Carbon::create($edate)->subDay();
            $d_period = CarbonPeriod::create($sdate,$alldate);
            $dt_array = [];
            foreach ($d_period as $period ){
                array_push($dt_array, date('Y-m-d', strtotime($period)));
            }

            $check_date_booking_ids = CarsBooksDates::whereIn('book_date',$dt_array)->distinct()->pluck('booking_id')->toArray();

                $cars = Car::withCount('car_numbers')->where('status',1)->get();

                return view('frontend.car.search_car', compact('cars', 'check_date_booking_ids'));

            
        } // End Method


    public function SearchCarDetails(Request $request, $id)
        {
            $request->flash();
            $cardetails = Car::find($id);
            $addons = Addon::where('cars_id',$id)->get();
    
            $otherCars = Car::where('id','!=', $id)->orderBy('id','DESC')->limit(2)->get();
            $car_id = $id;
            return view('frontend.car.search_car_details',compact('cardetails','addons','otherCars','car_id'));
        } // End Method

}
 