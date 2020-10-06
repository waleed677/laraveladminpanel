@extends('layout.mainlayout')
@section('content')

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
                @foreach($data as $item)
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
