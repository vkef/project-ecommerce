@extends('admin.admin_master')
@section('admin')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" >Admin</a>
      <a class="breadcrumb-item">Category</a>
      <span class="breadcrumb-item active">Edit Brand</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Brand Update</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update
    </h6>

 

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{url ('admin/categories/brands/update/' .$brands->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body pd-50">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brands->brand_name}}" name="brand_name">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brands->brand_image}}" name="brand_image">
                </div>

                <div class="mb-3">
                    <img src="{{ url($brands->brand_image) }}" height="70px;" width="90px;">
                    <input type="hidden" value="{{$brands->brand_image}}" name="old_image">

                </div>
        </div><!-- modal-body -->

        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Submit</button>
        </div>
    </form>

      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->

@endsection