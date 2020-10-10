@extends('layout.mainlayout')
@section('content')
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Uploaded Files</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total']['totalFiles']}}</div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TOTAL Categories</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total']['totalcategories']}}</div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL IMAGE FILES</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total']['totalImages']}}</div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">TOTAL Audio FILES</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total']['totalAudio']}}</div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
<div class="row">

    <!-- DataTales Example -->
    <div class="card shadow col-md-12 ">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Upload Files</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Type</th>
                <th>Date</th>
                <th>Action</th>

              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Type</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>

                @foreach($data['files'] as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->f_title}}</td>
                <td>{{$item->c_name}}</td>
                <td>{{$item->f_type}}</td>
                <td>{{substr($item->date,0,10)}}</td>
              <td><a href="files/{{$item->f_id}}/edit" class="btn btn-primary">Edit</a> <a href="files/{{$item->f_id}}" class="btn btn-danger">Delete</a></td>

              </tr>

              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

@endsection
