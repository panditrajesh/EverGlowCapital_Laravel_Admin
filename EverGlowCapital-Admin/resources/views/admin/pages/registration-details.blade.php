@extends('admin.layouts.app')
@section('title', 'Admin: Registration Details')

@section('content')
@section('page_section_name', 'Extras')   <!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
@section('page_name', 'Registered Users list')      
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
            @foreach ($users as $data)
                <a href="{{url("everglow-capital/admin/registered-users/" . $data->user_id)}}">
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