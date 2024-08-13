@extends('admin.layouts.app')
@section('title', 'Subscription')

@section('content')
@section('page_section_name', 'Subscription Management')   <!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
@section('page_name', 'Add Subscription')
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="subscription-field">
            @if (session()->has('success'))
                <span class="alert alert-success">
                    {{session()->get('success')}}
                </span>
            @endif
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="subscription_heading" class="form-label">Subscription Heading</label>
                    @error('subscription_heading')
                        <span class="txt text-danger">* {{$message}}</span>
                    @enderror
                    <input class="form-control" type="text" name="subscription_heading" id="subscription_heading">
                </div>
                <div class="mb-3">
                    <label for="subscription_para" class="form-label">Subscription para</label>
                    @error('subscription_para')
                        <span class="txt text-danger">* {{$message}}</span>
                    @enderror
                    <input class="form-control" type="text" id="subscription_para" name="subscription_para" multiple>
                </div>
                <a href="{{route("admin.subscription")}}"><button class="btn btn-success">Add</button></a>
            </form>

        </div>
    </div>
</section>
<!-- /.content -->
@endsection