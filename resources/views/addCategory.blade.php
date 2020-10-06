@extends('layout.mainlayout')

@section('content')
<div class="row">

    <!-- DataTales Example -->
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Add Category</div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if($message ?? '')
            <div class="alert alert-success">{{$message ?? ''}}</div>
                @endif
                <form method="POST" action="{{url('addCategory')}}">
                    @csrf
                    <!-- Form Group (username)-->

                    <!-- Form Row-->
                    <div class="form-row">
                        <!-- Form Group (first name)-->
                        <div class="form-group col-md-6">
                            <label class="small mb-1"  for="inputFirstName">Category Name</label>
                            <input class="form-control" name="category" id="inputFirstName" type="text"
                                placeholder="Enter Category name" />
                        </div>

                    </div>
                    <!-- Save changes button-->
                    <input class="btn btn-primary" type="submit" value="Save"/>
                </form>



            </div>
        </div>
    </div>
</div>


<div class="row">

    <!-- DataTales Example -->
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">

                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Category</th>
                          <th>Action</th>

                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>S.No</th>
                            <th>Category</th>
                          <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @foreach($data as $item)
                          <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->c_name}}</td>
                          <td><a href="category/{{$item->c_id}}/edit" class="btn btn-primary">Edit</a> <a href="category/{{$item->c_id}}" class="btn btn-danger">Delete</a></td>

                          </tr>

                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>




            </div>
        </div>
    </div>
</div>
@endsection
