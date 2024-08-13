@extends('admin.layouts.app')
@section('title', 'Contact Us')

@section('content')
@section('page_section_name', 'CMS Management')   <!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
@section('page_name', 'View List')
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
            <label class="form-label" for="subject">Subject</label>
            <input type="text" id="subject" class="form-control form-control-sm" value="{{$data->subject}}" />
        </div>
        <div class="form-outline" data-mdb-input-init>
            <label class="form-label" for="address">Address</label>
            <input type="text" id="address" class="form-control form-control-sm" value="{{$data->address}}" />
        </div>
        <div class="form-outline" data-mdb-input-init>
            <label class="form-label" for="message">Message</label>
            <input type="text" id="message" class="form-control form-control-sm" value="{{$data->message}}" />
        </div>
    </div>
</section>
<!-- /.content -->
@endsection