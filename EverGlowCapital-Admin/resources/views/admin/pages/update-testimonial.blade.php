@extends('admin.layouts.app')
@section('title', 'Testimonial section')    {{--page name--}}

@section('content')   {{--page content--}}
@section('page_section_name', 'Testimonial Management')   <!-- Content Header (Page header) -->
@section('page_name', 'Upload Testimonial')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <br>
        @if (session()->has('success'))
            <span class="alert alert-primary">
                {{session()->get('success')}}
            </span>
        @endif
        <div class="testimonial-section">
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="hidden_id" data-id="{{$testimonials->testimonial_id}}">
                <!-- Testimonial Heading -->
                <label class="form-label" for="testimonial_section_heading">Testimonial section Heading</label>
                <br>
                @error('testimonial_section_heading')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="testimonial_section_heading" name="testimonial_section_heading"
                    class="form-control" value="{{$testimonials->testimonial_section_heading}}" />
                <br>
                <!-- Testimonial image -->
                <label class="form-label" for="testimonial_image">Testimonial Image</label>
                <br>
                @error('testimonial_image')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="file" id="testimonial_image" name="testimonial_image" class="form-control"
                    value="{{$testimonials->testimonial_image}}" />
                <br>
                <!-- Testimonial heading -->
                <label class="form-label" for="testimonial_heading">Testimonial Heading</label>
                <br>
                @error('testimonial_heading')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <br>
                <input type="text" id="testimonial_heading" name="testimonial_heading" class="form-control"
                    value="{{$testimonials->testimonial_heading}}" />
                <br>
                <!-- Testimonial short description -->
                <label class="form-label" for="testimonial_shortdesc">Testimonial Short description</label>
                <br>
                @error('testimonial_shortdesc')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <br>
                <input type="text" id="testimonial_shortdesc" name="testimonial_shortdesc" class="form-control"
                    value="{{$testimonials->testimonial_shortdesc}}" />
                <br>

                <!-- Testimonial author -->
                <label class="form-label" for="testimonial_author">Testimonial Author</label>
                <br>
                @error('testimonial_author')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <br>
                <input type="text" id="testimonial_author" name="testimonial_author" class="form-control"
                    value="{{$testimonials->testimonial_author}}" />
                <br>
                <!-- Testimonial author position -->
                <label class="form-label" for="testimonial_author_position">Testimonial Author Position</label>
                <br>
                @error('testimonial_author_position')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <br>
                <input type="text" id="testimonial_author_position" name="testimonial_author_position"
                    class="form-control" value="{{$testimonials->testimonial_author_position}}" />
                <br>
                <a href="{{route("admin.testimonial.update", $testimonials->testimonial_id)}}"><button
                        class="btn btn-primary">Update Testimonial</button></a>

            </form>
        </div>
    </div>
</section>

@endsection