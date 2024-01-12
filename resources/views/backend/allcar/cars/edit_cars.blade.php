@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container">
    <div class="main-body">
      <div class="row">


  <div class="card">
    <div class="card-body">
      <ul class="nav nav-tabs nav-primary" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
            <div class="d-flex align-items-center">
              <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
              </div>
              <div class="tab-title">Manage Car</div>
            </div>
          </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false" tabindex="-1">
            <div class="d-flex align-items-center">
              <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
              </div>
              <div class="tab-title">Car No.</div>
            </div>
          </a>
        </li>

      </ul>
      <div class="tab-content py-3">
        <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
        
        <!---Start Primary Form -->
          <div class="col-xl-12 mx-auto">
						
						<div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4">Upsate Car</h5>

								<form class="row g-3" action="{{ route('update.car',$editData->id) }}" method="post" enctype="multipart/form-data">
                  @csrf


									<div class="col-md-4">
										<label for="input1" class="form-label">Car Type</label>
										<input type="text" class="form-control" name="cartype_id" id="input1" value="{{ $editData['type']['name'] }}">
									</div>
									<div class="col-md-4">
										<label for="input2" class="form-label">Brand</label>
										<input type="text" class="form-control" name="brand" id="input2" value="{{ $editData->brand }}">
									</div>
                  <div class="col-md-4">
										<label for="input2" class="form-label">Model</label>
										<input type="text" class="form-control" name="model" id="input2" value="{{ $editData->model }}">
									</div>
                  <div class="col-md-4">
										<label for="input2" class="form-label">Capacity</label>
										<input type="text" class="form-control" name="capacity" id="input2" value="{{ $editData->capacity }}">
									</div>
									<div class="col-md-6">
										<label for="input3" class="form-label">Price / Day</label>
										<input type="text" class="form-control" name="price" id="input3" value="{{ $editData->price }}">
									</div>
									<div class="col-md-6">
										<label for="input4" class="form-label">Size</label>
										<input type="text" class="form-control" name="size" id="input4" value="{{ $editData->size }}">
									</div>
									
                  <div class="col-md-6">
										<label for="input5" class="form-label">Image</label>
										<input type="file" class="form-control" name="image" id="image">

                    <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/carimg/' .$editData->image) : url('upload/no_image.jpg')}}" alt="Admin" class="bg-primary" width="60">
 


                  </div>

									<div class="col-md-6">
										<label for="input6" class="form-label">Discount( % )</label>
										<input type="text" class="form-control" name="discount" id="input4" value="{{ $editData->discount }}">
									</div>
                  <div class="col-md-12">
										<label for="input6" class="form-label">Description</label>
										<textarea type="text" rows="3" class="form-control" name="description" id="myeditorinstance" >{!! $editData->description !!}</textarea>
									</div>





                  
                  <div class="row mt-2">
                  <div class="col-md-12 mb-3">
                     @forelse ($basic_facility as $item)
                     <div class="basic_facility_section_remove" id="basic_facility_section_remove">
                        <div class="row add_item">
                           <div class="col-md-8">
                              <label for="addons_name" class="form-label"> Addons </label>
                              <select name="addons_name[]" id="addons_name" class="form-control">
                                    <option value="">Select Addons</option>
                                    <option value="Skip the Pump and Save Time" {{$item->addons_name == 'Skip the Pump and Save Time'?'selected':''}}>Skip the Pump and Save Time</option>
                                    <option value="Accelerator and Brake Hand Controls"  {{$item->addons_name == 'Accelerator and Brake Hand Controls'?'selected':''}}>Accelerator and Brake Hand Controls</option>
                                  
                                    <option value="Infant Child Seat"  {{$item->addons_name == 'Infant Child Seat'?'selected':''}}>Infant Child Seat</option>
                                  
                                    <option value="Child Seat" {{$item->addons_name == 'Child Seat'?'selected':''}}>Child Seat</option>
                                  
                                    <option value="Booster Seat"  {{$item->addons_name == 'Booster Seat'?'selected':''}}>Booster Seat</option>
                                  
                                    <option value="Protect the Car" {{$item->addons_name == 'Protect the Car'?'selected':''}}>Protect the Car</option>
                                  
                                    <option value="Protect yourself from liability" {{$item->addons_name == 'Protect yourself from liability'?'selected':''}} >Protect yourself from liability</option>
                                  
                                    <option value="Protect yourself, passengers & belongings" {{$item->addons_name == 'Protect yourself, passengers & belongings'?'selected':''}} >Protect yourself, passengers & belongings</option>
                                  
                                    <option value="Wheelchair Accessible Bus" {{$item->addons_name == 'Wheelchair Accessible Bus'?'selected':''}} >Wheelchair Accessible Bus</option>
                                  
                                    <option value="Drive with total peace of mind" {{$item->addons_name == '>Drive with total peace of mind'?'selected':''}} >Drive with total peace of mind</option>
                              </select>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group" style="padding-top: 30px;">
                                    <a class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></a>
                                    <span class="btn btn-danger btn-sm removeeventmore"><i class="lni lni-circle-minus"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                 
                     @empty
                 
                          <div class="basic_facility_section_remove" id="basic_facility_section_remove">
                              <div class="row add_item">
                                  <div class="col-md-6">
                                      <label for="addons_name" class="form-label">Addons </label>
                                      <select name="addons_name[]" id="addons_name" class="form-control">
                                        <option value="">Select Addons</option>
                                        <option value="Skip the Pump and Save Time">Skip the Pump and Save Time</option>
                                        <option value="Accelerator and Brake Hand Controls">Accelerator and Brake Hand Controls</option>
                                      
                                        <option value="Infant Child Seat">Infant Child Seat</option>
                                      
                                        <option value="Child Seat">Child Seat</option>
                                      
                                        <option value="Booster Seat">Booster Seat</option>
                                      
                                        <option value="Protect the Car">Protect the Car</option>
                                      
                                        <option value="Protect yourself from liability">Protect yourself from liability</option>
                                      
                                        <option value="Protect yourself, passengers & belongings">Protect yourself, passengers & belongings</option>
                                      
                                        <option value="Wheelchair Accessible Bus">Wheelchair Accessible Bus</option>
                                      
                                        <option value="Drive with total peace of mind">Drive with total peace of mind</option>
                                      </select>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group" style="padding-top: 30px;">
                          <a class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></a>
                 
                         <span class="btn btn-danger removeeventmore"><i class="lni lni-circle-minus"></i></span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                 
                     @endforelse
                 
                 
                 
                                      </div> 
                                   </div>
                                   <br>






									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Save Changes</button>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
        
        
        </div> 
        <!---End Primary Form -->








        <!---End Primary Form -->
        <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
          <div class="card">
            <div class="car-body">
              <a class="card-title btn btn-primary float-right" onclick="addCarNo()" id="addCarNo">
                <i class="lni lni-plus"></i>
              </a>
      <div class="carnoHide" id="carnoHide">
        <form action="{{ route('store.car.no',$editData->id) }}" method="post" class="p-5">
          @csrf
            <input type="text" name="car_type_id" value="{{ $editData->cartype_id }}">

          <div class="row">
          <div class="col-md-4">
            <label for="input2" class="form-label">Car No.</label>
            <input type="text" name="car_no" class="form-control" id="input2">
        </div>

        <div class="col-md-4">
            <label for="input7" class="form-label">Status</label>
            <select name="status" id="input7" class="form-select">
                <option selected="">Select Status</option>
                <option value="Available">Available </option>
                <option value="Unavailable">Unavailable </option>
               
            </select>
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-success" style="margin-top:28px;">Save</button>
        </div>
      </div>

        </form>
      </div>
    <!--- Table-->
    
    <table class="table mb-0 table-striped" id="carview">
      <thead>
          <tr>
              <th scope="col">Car Number</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th> 
          </tr>
      </thead>
      <tbody>
    
         
         @foreach ($allcarNo as $item)
             
          <tr> 
              <td>{{ $item->car_no }}</td>
              <td>{{ $item->status }}</td>
              <td>
<a href="{{ route('edit.carno',$item->id) }}" class="btn btn-warning px-3 radius-30"> Edit</a>
<a href="{{ route('delete.carno',$item->id) }}" class="btn btn-danger px-3 radius-30" id="delete"> Delete</a>  

              </td>
          </tr>

          @endforeach
          
          
      </tbody>
  </table>

    <!--- Table-->




            </div>
            </div>


        </div>
        <!---End Primary Form -->
        

      </div>
    </div>
  </div>


      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

<!--========== Start of add Basic Plan Facilities ==============-->
<div style="visibility: hidden">
  <div class="whole_extra_item_add" id="whole_extra_item_add">
     <div class="basic_facility_section_remove" id="basic_facility_section_remove">
        <div class="container mt-2">
           <div class="row">
              <div class="form-group col-md-6">
                 <label for="basic_facility_name">Addons</label>
                 <select name="addons_name[]" id="addons_name" class="form-control">
                  <option value="">Select Addons</option>
                  <option value="Skip the Pump and Save Time">Skip the Pump and Save Time</option>
                  <option value="Accelerator and Brake Hand Controls">Accelerator and Brake Hand Controls</option>
                
                  <option value="Infant Child Seat">Infant Child Seat</option>
                
                  <option value="Child Seat">Child Seat</option>
                
                  <option value="Booster Seat">Booster Seat</option>
                
                  <option value="Protect the Car">Protect the Car</option>
                
                  <option value="Protect yourself from liability">Protect yourself from liability</option>
                
                  <option value="Protect yourself, passengers & belongings">Protect yourself, passengers & belongings</option>
                
                  <option value="Wheelchair Accessible Bus">Wheelchair Accessible Bus</option>
                
                  <option value="Drive with total peace of mind">Drive with total peace of mind</option>
                </select>
              </div>
              <div class="form-group col-md-6" style="padding-top: 20px">
                 <span class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></span>
                 <span class="btn btn-danger removeeventmore"><i class="lni lni-circle-minus"></i></span>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
     var counter = 0;
     $(document).on("click",".addeventmore",function(){
           var whole_extra_item_add = $("#whole_extra_item_add").html();
           $(this).closest(".add_item").append(whole_extra_item_add);
           counter++;
     });
     $(document).on("click",".removeeventmore",function(event){
           $(this).closest("#basic_facility_section_remove").remove();
           counter -= 1
     });
  });
</script>
<!--========== End of Basic Plan Facilities ==============-->

  <!--========== Start car Number Add ==============-->
  <script>
    $('#carnoHide').hide();
    $('#carview').show();

    function addCarNo(){
        $('#carnoHide').show();
        $('#carview').hide();
        $('#addCarNo').hide();
    }

</script>

<!--========== End car Number Add ==============-->

@endsection