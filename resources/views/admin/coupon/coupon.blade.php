@extends('admin.admin_master')
@section('admin')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" >Admin</a>
      <a class="breadcrumb-item">Coupon</a>
      <span class="breadcrumb-item active">Coupons</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Coupon Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Coupon List
        <a href="" class="btn btn-sm btn-info" style="float:right;"  data-toggle="modal" data-target="#modal1">Add New</a>
    </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-5p">ID</th>
                <th class="wd-15p">Coupon Code</th>
                <th class="wd-15p">Coupon Percentage</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($coupon as $key=>$row)
              <tr>
                <td>{{$key +1}}</td>
                <td>{{$row->coupon}}</td>
                <td>{{$row->discount}} % </td>
                <td>
                    <a href="{{url('admin/categories/coupon/edit/' .$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{url('admin/categories/coupon/delete/' .$row->id)}}" class="btn btn-sm btn-dark" id="delete">Delete</a>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->

  </div><!-- sl-mainpanel -->



  <div id="modal1" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add coupon</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{route('store.coupon')}}">
        @csrf
        <div class="modal-body pd-50">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Code</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Code" name="coupon">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Discount (%)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Discount Percentage" name="discount">
                </div>
        </div><!-- modal-body -->

        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Submit</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
        </div>
    </form>

      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->

@endsection