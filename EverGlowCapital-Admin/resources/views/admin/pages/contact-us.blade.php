@extends('admin.layouts.app')
@section('title', 'Admin: Contact Us')

@section('content')
@section('page_section_name', 'CMS Management')   <!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
@section('page_name', 'Contact Us')
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="received-contacts">
            <div class="row border" style="height: 50px;">
                <div class="col-md">
                    #
                </div>
                <div class="col-md">
                    <b>Name</b>
                </div>
                <div class="col-md">
                    <b>Email</b>
                </div>
            </div>
            <br>
            @foreach ($contacts as $data)
                <a href="{{url('everglow-capital/admin/contact-us/' . $data->user_id)}}">
                    <div class="row border" style="height: 50px;">
                        <div class="col-md">
                            {{$data->user_id}}
                        </div>
                        <div class="col-md">
                            {{$data->firstname}}
                        </div>
                        <div class="col-md">
                            {{$data->email}}
                        </div>
                    </div>
                </a>
                <br>
            @endforeach

        </div>
    </div>
</section>
<!-- /.content -->
@endsection