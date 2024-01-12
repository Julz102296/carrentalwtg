<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarType;
use App\Models\BookArea;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use App\Models\Car;

class CarTypeController extends Controller
{
    public function CarTypeList()
        {
            $allData = CarType::orderBy('id','desc')->get();
            return view('backend.allcar.cartype.view_cartype', compact('allData'));
        } // End Method

    public function AddCarType()
        {
            return view('backend.allcar.cartype.add_cartype');
        } // End Method

    public function CarTypeStore(Request $request)
        {
            $cartype_id = CarType::insertGetId([
                'name' => $request->name,
                'created_at' => Carbon::now(),
            ]);

            Car::insert([
                'cartype_id' => $cartype_id,
            ]);

            $notification = array(
                'message' => 'Car Type Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('car.type.list')->with($notification);
        } // End Method
}
