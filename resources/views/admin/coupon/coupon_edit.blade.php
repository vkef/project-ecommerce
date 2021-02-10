@extends('admin.admin_master')
@section('admin')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" >Admin</a>
      <a class="breadcrumb-item">Coupon</a>
      <span class="breadcrumb-item active">Edit Coupons</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Coupon Update</h5>
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

        <form method="POST" action="{{url ('admin/categories/coupon/update/' .$coupon->id)}}">
        @csrf
        <div class="modal-body pd-50">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Coupon Code</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$coupon->coupon}}" name="coupon">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Discount Code (%)</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$coupon->discount}}" name="discount">
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