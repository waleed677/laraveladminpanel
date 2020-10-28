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
                <form method="POST" action="{{url('updateFile')}}" enctype="multipart/form-data">
                    @csrf
                    <!-- Form Group (username)-->

                    <!-- Form Row-->
                <input type="hidden" name="id" value="{{$data->f_id}}" />
                <input type="hidden" name="fileValue" value="{{$data->location}}" />
                    <!-- Form Group (first name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputFirstName">Title</label>
                        <input class="form-control" id="inputFirstName" type="text"
                    placeholder="Enter Title" name="title" value="{{$data->f_title}}" />
                    </div>

                     <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Select Category </label>
                        <select class="form-control form-control-solid" id="exampleFormControlSelect1" name="category">
                        <option value="{{$data->c_id}}">{{$data->c_name}}</option>
                            @foreach ($category as $cat)
                          <option value="{{$cat->c_id}}">{{$cat->c_name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">File Type</label>
                        <select name="type" class="form-control form-control-solid" id="exampleFormControlSelect1">
                        <option value="{{$data->f_type}}">{{$data->f_type}}</option>
                            <option value="Audio">Audio</option>
                            <option value="Image">Image</option>

                        </select>
                    </div>

                    @if($data->f_type =='Image')
                <img src="{{ asset('/storage/files/'.$data->location)}}"  alt="{{ $data->location }}"/>
                    @endif


                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputFirstName">Select a File to upload</label>
                        <input class="form-control" id="inputFirstName" type="file" name="file"/>
                    </div>
                    <!-- Save changes button-->
                    <input class="btn btn-primary" type="submit" value="Update" name="submit">
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
