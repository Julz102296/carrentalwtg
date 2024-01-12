@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit Car No.</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Edit Car No.</li>
        </ol>
      </nav>
    </div>
    </div>

  <!--end breadcrumb-->
  <div class="container">
    <div class="main-body">
      <div class="row">

  <div class="col-lg-8">
  <div class="card">

    <form action="{{ route('update.carno', $editcarno->id) }}" method="post" enctype="multipart/form-data">
      @csrf


    <div class="card-body">
      <div class="row mb-3">
        <div class="col-sm-3">
          <h6 class="mb-0">Car Number</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          <input type="text" name="car_no" class="form-control" value="{{ $editcarno->car_no }}" />
        </div>
      </div>

      <div class="card-body">
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Status</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <select name="status" id="input7" class="form-select">
              <option selected="">Select Status...</option>
              <option value="Available" {{ $editcarno->status == 'Available'?'selected':''}}>Available</option>
              <option value="Unavailable" {{ $editcarno->status == 'Unavailable'?'selected':''}}>Unavailable</option>
          </select>          
          </div>
        </div>

      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9 text-secondary">
          <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
        </div>
      </div>
    </div>
    </form>

  </div>
  </div>
      </div>
    </div>
  </div>
</div>




@endsection