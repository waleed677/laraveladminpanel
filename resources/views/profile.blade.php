@extends('layout.mainlayout')

@section('content')

<div class="row">

    <!-- DataTales Example -->
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account Details</div>

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif

            <div class="card-body">
                <form method="POST" action="update">
                    @csrf
                    <!-- Form Group (username)-->

                    <!-- Form Row-->

                    <!-- Form Group (first name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputFirstName">Name</label>
                        <input class="form-control" name="name" id="inputFirstName" type="text"
                            placeholder="Enter your first name" value="{{$data->name}}" />
                    </div>



                    <!-- Form Group (email address)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                        <input class="form-control" name="email" id="inputEmailAddress" type="email"
                            placeholder="Enter your email address" value="{{$data->email}}" />
                    </div>
                    <!-- Save changes button-->
                    <input type="submit" name="submit" class="btn btn-primary" value="Update Profile" />
                </form>


                <hr>

                <h2> Change Password</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="update">
                    @csrf
                    <!-- Form Group (username)-->

                    <!-- Form Row-->

                    <!-- Form Group (first name)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputFirstName">Password</label>
                        <input class="form-control" name="password" id="inputFirstName" type="password"
                            placeholder="Enter New Password" />
                    </div>



                    <!-- Form Group (email address)-->
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputEmailAddress">Confirm Password</label>
                        <input class="form-control" name="cpassword" id="inputEmailAddress" type="password"
                            placeholder="Enter Confirm Password" />
                    </div>
                    <!-- Save changes button-->
                    <input class="btn btn-primary" type="submit" value="Update Password" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
