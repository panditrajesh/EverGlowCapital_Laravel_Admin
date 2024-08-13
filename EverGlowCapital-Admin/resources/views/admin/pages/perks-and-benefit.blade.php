@extends('admin.layouts.app')
@section('title', 'Perks & Benefits')

@section('content')
@section('page_section_name', 'Benefit Management')   <!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
@section('page_name', 'Add Perks & Benefits')
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="subscription-field">
            @if (session()->has('success'))
                <span class="alert alert-secondary">
                    {{session()->get('success')}}
                </span>
            @endif
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="benefit_heading" class="form-label">Benefit Heading</label>
                    @error('benefit_heading')
                        <span class="txt text-danger">* {{$message}}</span>
                    @enderror
                    <input class="form-control" type="text" id="benefit_heading" name="benefit_heading"
                        value="{{old("benefit_heading")}}">
                </div>
                @csrf
                <div class="box-model">
                    <div class="mb-3">
                        <label for="benefit_image" class="form-label">Benefit image</label>
                        @error('benefit_image')
                            <span class="txt text-danger">* {{$message}}</span>
                        @enderror
                        <input class="form-control form-control-sm" id="benefit_image" name="benefit_image" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="benefit_name" class="form-label">Benefit Name</label>
                        @error('benefit_name')
                            <span class="txt text-danger">* {{$message}}</span>
                        @enderror
                        <input class="form-control form-control-sm" id="benefit_name" name="benefit_name" type="text"
                            value="{{old("benefit_name")}}">
                    </div>
                    <div>
                        <label for="benefit_desc" class="form-label">Benefit Short Desc</label>
                        @error('benefit_desc')
                            <span class="txt text-danger">* {{$message}}</span>
                        @enderror
                        <input class="form-control form-control-lg" id="benefit_desc" name="benefit_desc" type="text"
                            value="{{old("benefit_desc")}}">
                    </div>
                </div>
                <br>
                <a href="{{route("admin.benefit")}}"><button class="btn btn-primary">Submit</button></a>
            </form>

        </div>
    </div>
</section>
<!-- /.content -->
@endsection