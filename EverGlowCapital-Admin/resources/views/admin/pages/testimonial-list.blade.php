@extends('admin.layouts.app')
@section('title', 'Testimonial section')    {{--page name--}}

@section('content')   {{--page content--}}

@section('page_section_name', 'Testimonial Management')   <!-- Content Header (Page header) -->
@section('page_name', 'Testimonial List')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        @if (session()->has('success'))
            <span class="alert alert-secondary">{{session()->get('success')}}</span>
        @endif
        <div class="testimonial-list">
            <div class="row border" style="height: 50px;">
                <div class="col-md">
                    #
                </div>
                <div class="col-md">
                    <b>Testimonial Title</b>
                </div>
                <div class="col-md">
                    <b>Testimonial Short Desc.</b>
                </div>
                <div class="col-md">
                    <b>Testimonial Image</b>
                </div>
                <div class="col-md">
                    <b>Testimonial Author</b>
                </div>
                <div class="col-md">
                    <b>Operations</b>
                </div>
            </div>
            @foreach ($testimonials as $data)
                <div class="row border">
                    <div class="col-md">
                        {{$data->testimonial_id}}
                    </div>
                    <div class="col-md">
                        {{$data->testimonial_heading}}
                    </div>
                    <div class="col-md">
                        {{$data->testimonial_shortdesc}}
                    </div>
                    <div class="col-md">
                        <img src="{{asset("uploads/" . $data->testimonial_image)}}" alt="image" height="100px"
                            width="100px">
                    </div>
                    <div class="col-md">
                        {{$data->testimonial_author}}
                    </div>
                    <div class="col-md">
                        <a class="btn btn-primary"
                            href="{{route("admin.testimonial.edit", $data->testimonial_id)}}}}">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you want to delete?');"
                            href="{{route("admin.testimonial.delete", $data->testimonial_id)}}">Delete</a>
                    </div>
                </div>
                <br>
            @endforeach

        </div>
    </div>
</section>

@endsection