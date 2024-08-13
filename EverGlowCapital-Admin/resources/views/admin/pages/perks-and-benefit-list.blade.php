@extends('admin.layouts.app')
@section('title', 'Perks & Benefits')    {{--page name--}}

@section('content')   {{--page content--}}
@section('page_section_name', 'Benefit Management')   <!-- Content Header (Page header) -->

@section('page_name', 'Benfits List')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        @if (session()->has('message'))
            <span class="alert alert-success">{{session()->get('message')}}</span>
        @endif
        <div class="benefit-list">
            <div class="row border" style="height: 50px;">
                <div class="col-md">
                    #
                </div>
                <div class="col-md">
                    <b>Benefit Heading</b>
                </div>
                <div class="col-md">
                    <b>Benefit Image</b>
                </div>
                <div class="col-md">
                    <b>Benefit Short Desc.</b>
                </div>
                <div class="col-md">
                    <b>Operations</b>
                </div>
            </div>
            @foreach ($benefits as $data)
                <div class="row border">
                    <div class="col-md">
                        {{$data->benefit_id}}
                    </div>
                    <div class="col-md">
                        {{$data->benefit_heading}}
                    </div>
                    <div class="col-md">
                        <img src="{{asset('uploads/' . $data->benefit_image)}}" alt="" height="100px" width="100px">
                    </div>
                    <div class="col-md">
                        {{$data->benefit_desc}}
                    </div>
                    <div class="col-md">
                        <a class="btn btn-primary" href="{{route("admin.benefit.edit", $data->benefit_id)}}">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you want to delete?');"
                            href="{{route("admin.benefit.delete", $data->benefit_id)}}">Delete</a>
                        <!-- <button data-id="{{$data->faq_id}}" class="btn-primary" type="submit">Edit</button> -->
                        <!-- <button data-id="{{$data->faq_id}}" class="btn-danger" type="submit">Delete</button> -->
                    </div>
                </div>
                <br>
            @endforeach

        </div>
    </div>
</section>

@endsection