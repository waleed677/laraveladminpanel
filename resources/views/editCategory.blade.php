@extends('layout.mainlayout')
@section('content')
<div class="row">

    <!-- DataTales Example -->
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Edit Category</div>
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
                <form method="POST" action="{{url('updateCategory')}}">
                    @csrf
                    <!-- Form Group (username)-->

                    <!-- Form Row-->
                <input type="hidden" name="id" value="{{$data->c_id}}" />

                    <!-- Form Group (first name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputFirstName">Category Name</label>
                        <input class="form-control" id="inputFirstName" type="text"
                    placeholder="Enter Title" name="cname" value="{{$data->c_name}}" />
                    </div>
                    <!-- Save changes button-->
                    <input class="btn btn-primary" type="submit" value="Update" name="submit">
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
