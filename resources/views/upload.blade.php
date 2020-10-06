@extends('layout.mainlayout')
@section('content')
<div class="row">

    <!-- DataTales Example -->
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Upload Files</div>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
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
                <form method="POST" action="upload" enctype="multipart/form-data">
                    @csrf
                    <!-- Form Group (username)-->

                    <!-- Form Row-->

                    <!-- Form Group (first name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputFirstName">Title</label>
                        <input class="form-control" id="inputFirstName" type="text"
                            placeholder="Enter Title" name="title" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Select Category </label>
                        <select class="form-control form-control-solid" id="exampleFormControlSelect1" name="category">
                            <option value="">Select Category</option>
                            @foreach ($data as $item)
                          <option value="{{$item->c_id}}">{{$item->c_name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">File Type</label>
                        <select name="type" class="form-control form-control-solid" id="exampleFormControlSelect1">
                            <option value="">Select Category</option>
                            <option value="Audio">Audio</option>
                            <option value="Image">Image</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>


                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputFirstName">Upload File</label>
                        <input class="form-control" id="inputFirstName" type="file"
                            placeholder="Enter your first name" name="file" />
                    </div>
                    <!-- Save changes button-->
                    <input class="btn btn-primary" type="submit" value="Upload" name="submit">
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
