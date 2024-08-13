@extends('admin.layouts.app')
@section('title', 'Registration Details')

@section('content')
@section('page_section_name', 'Extras')   <!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
@section('page_name', 'Registered User Profile')
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="form-outline" data-mdb-input-init>
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" class="form-control form-control-lg"
                value="{{$data->firstname . " " . $data->lastname}}" />
        </div>

        <div class="form-outline" data-mdb-input-init>
            <label class="form-label" for="email">Email</label>
            <input type="text" id="email" class="form-control" value="{{$data->email}}" />
        </div>

        <div class="form-outline" data-mdb-input-init>
            <label class="form-label" for="phone">Contact Number</label>
            <input type="text" id="phone" class="form-control form-control-sm" value="{{$data->phone}}" />
        </div>
        <div class="form-outline" data-mdb-input-init>
            <label class="form-label" for="username">Username</label>
            <input type="text" id="username" class="form-control form-control-sm" value="{{$data->username}}" />
        </div>
    </div>
</section>
<!-- /.content -->
@endsection