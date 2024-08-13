@extends('admin.layouts.app')
@section('title', 'Profile')    {{--page name--}}

@section('content')   {{--page content--}}

@section('page_name', 'Admin Profile')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="admin-profile">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$data->id}}" name="hidden_id">
                <div class="mb-3">
                    <label for="admin_email" class="form-label">Email address</label>
                    @error('admin_email')
                        <span class="txt text-danger">* {{$message}}</span>

                    @enderror
                    <input type="email" class="form-control" id="admin_email" name="admin_email"
                        value="{{$data->email}}">
                </div>
                <div class="mb-3">
                    <label for="admin_name" class="form-label">Name</label>
                    @error('admin_name')
                        <span class="txt text-danger">* {{$message}}</span>

                    @enderror
                    <input type="text" class="form-control" id="admin_name" name="admin_name" value="{{$data->name}}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="admin_image">Update Image</label>
                    @error('admin_image')
                        <span class="txt text-danger">* {{$message}}</span>

                    @enderror
                    <input type="file" class="form-control" id="admin_image" name="admin_image">
                </div>
                <a href="{{route("admin.profile.update", $data->id)}}">
                    <button class="btn btn-success" type="submit">Update Details</button>
                </a>
            </form>

        </div>
    </div>
</section>

@endsection