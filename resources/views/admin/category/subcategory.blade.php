@extends('admin.admin_master')
@section('admin')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" >Admin</a>
      <a class="breadcrumb-item">Category</a>
      <span class="breadcrumb-item active">Sub Category</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Sub-Category Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">SubCategory List
        <a href="" class="btn btn-sm btn-info" style="float:right;"  data-toggle="modal" data-target="#modal1">Add New</a>
    </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-5p">ID</th>
                <th class="wd-15p">SubCategory name</th>
                <th class="wd-15p">Category name</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($subcat as $key=>$row)
              <tr>
                <td>{{$key +1}}</td>
                <td>{{$row->subcategory_name}}</td>
                <td>{{$row->category_name}}</td>
                <td>
                    <a href="{{url('admin/categories/edit/' .$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{url('admin/categories/delete/' .$row->id)}}" class="btn btn-sm btn-dark" id="delete">Delete</a>

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
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add subcategory</h6>
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

        <form method="POST" action="{{route('store.subcat')}}">
        @csrf
        <div class="modal-body pd-50">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">SubCategory Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sub-Category" name="subcategory_name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">All Category Name</label>
                    <select class="form-control" name="category_id">

                        @foreach($category as $row)
                        <option value="$row->id">{{$row->category}}</option>
                        @endforeach

                    </select>
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