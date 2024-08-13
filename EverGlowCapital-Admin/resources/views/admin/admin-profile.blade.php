@extends('admin.layouts.app')
@section('title', 'Profile')    {{--page name--}}

@section('content')   {{--page content--}}

@section('page_name', 'Admin Profile')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="admin-profile">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('uploads/' . $admin->admin_image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <input type="hidden" name="hidden_id" value="{{$admin->id}}">
                    <h5 class="card-title"><b>Name</b><br>
                        <span class=" text-danger">{{$admin->name}}</span>
                    </h5>
                    <p class="card-text"><b>Email Id</b>
                        <br> <span class=" text-danger">{{$admin->email}}</span>
                    </p>
                </div>
            </div>
            <a class="btn btn-dark" href="{{route("admin.profile.edit", $admin->id)}}">Edit Details</a>
        </div>
    </div>
</section>

@endsection