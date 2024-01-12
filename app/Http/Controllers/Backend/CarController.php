<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Addon;
use App\Models\CarNumber;
use App\Models\CarType;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class CarController extends Controller
{
    public function EditCar($id)
        {
            $basic_facility = Addon::where('cars_id', $id)->get();
            $editData = Car::find($id);
            $allcarNo = CarNumber::where('cars_id', $id)->get();
            return view('backend.allcar.cars.edit_cars',compact('editData', 'basic_facility','allcarNo'));
        } // End Method

    public function UpdateCar(Request $request, $id)
        {
            $car = Car::find($id);
            $car->cartype_id = $car->cartype_id;
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->capacity = $request->capacity;
            $car->price = $request->price;
            $car->size = $request->size;
            $car->image = $request->image;
            $car->discount = $request->discount;
            $car->description = $request->description;
            $car->status = 1;


            if($request->file('image')) {
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
                $img = $manager->read($request->file('image'));
                $img = $img->resize(480,850);

                $img->toJpeg(80)->save(base_path('public/upload/carimg/'.$name_gen));
                $car['image'] = $name_gen;
                
            }

            $car->save();

            // update for addons

            if($request->addons_name == NULL){
                $notification = array(
                    'message' => 'Sorry you must Select Addons ',
                    'alert-type' => 'error'
                );
    
                return redirect()->back()->with($notification);
            } else {
                Addon::where('cars_id',$id)->delete();
                $addons = Count($request->addons_name);
                
                for($i=0; $i < $addons; $i++){
                    $addonscount = new Addon();
                    $addonscount->cars_id = $car->id;
                    $addonscount->addons_name = $request->addons_name[$i];
                    $addonscount->save();
                } // end for
            } // end else

            $notification = array(
                'message' => 'Car Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification); 

        } // End Method

    public function StoreCarNumber(Request $request, $id)
        {
            $data = new CarNumber();
            $data->cars_id = $id;
            $data->car_type_id = $request->car_type_id;
            $data->car_no = $request->car_no;
            $data->status = $request->status;
            $data->save();
        
            $notification = array(
                'message' => 'Car Number Added Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification); 
        
        } // End Method

    public function EditCarNumber($id)
        {
            $editcarno = CarNumber::find($id);
            return view('backend.allcar.cars.edit_car_no',compact('editcarno'));
        } // End Method
    
    public function UpdateCarNumber(Request $request, $id)
        {
            $data = CarNumber::find($id);
            $data->car_no = $request->car_no;
            $data->status = $request->status;
            $data->save();

            $notification = array(
                'message' => 'Car Number Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('car.type.list')->with($notification); 

        } // End Method

    public function DeleteCarNumber($id)
        {
            CarNumber::find($id)->delete();

            $notification = array(
                'message' => 'Car Number Delete Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('car.type.list')->with($notification); 

        } // End Method


    public function DeleteCar(Request $request, $id)
        {
            $car = Car::find($id);

            if (file_exists('upload/carimg/'.$car->image) AND ! empty($car->image)) {
               @unlink('upload/carimg/'.$car->image);
            }
    
            CarType::where('id',$car->cartype_id)->delete();
            Addon::where('cars_id',$car->id)->delete();
            CarNumber::where('cars_id',$car->id)->delete();
            $car->delete();
    
            $notification = array(
                'message' => 'Car Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);  
    
        }//End Method
        
}
