@extends('admin.layouts.app')
@section('title', 'Blog section')    {{--page name--}}

@section('content')   {{--page content--}}
@section('page_section_name', 'Blog Management')   <!-- Content Header (Page header) -->

@section('page_name', 'Add Blog')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <br>
        @if (session()->has('success'))
            <span class="alert alert-danger">
                {{session()->get('success')}}
            </span>
        @endif
        <div class="blog-section">
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Blog P -->
                <input type="hidden" name="hidden_id" data-id="{{$blogs->blog_id}}">
                <label class="form-label" for="blog_para">Blog section Para</label>
                <br>
                @error('blog_para')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="blog_para" name="blog_para" class="form-control" value="{{$blogs->blog_para}}" />

                <!-- Blog Heading -->
                <label class="form-label" for="blog_section_heading">Blog section Heading</label>
                <br>
                @error('blog_section_heading')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="blog_section_heading" name="blog_section_heading" class="form-control"
                    value="{{$blogs->blog_section_heading}}" />

                <!-- blog image -->
                <label class="form-label" for="blog_image">Blog Image</label>
                <br>
                @error('blog_image')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="file" id="blog_image" name="blog_image" class="form-control" value="" />

                <!-- blog category -->
                <label class="form-label" for="blog_category">Blog Category</label>
                <br>
                @error('blog_category')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="blog_category" name="blog_category" class="form-control"
                    value="{{$blogs->blog_category}}" />

                <!-- blog heading -->
                <label class="form-label" for="blog_heading">Blog Heading</label>
                <br>
                @error('blog_heading')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="blog_heading" name="blog_heading" class="form-control"
                    value="{{$blogs->blog_heading}}" />

                <!-- blog short description -->
                <label class="form-label" for="blog_shortdesc">Blog Short description</label>
                <br>
                @error('blog_shortdesc')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="blog_shortdesc" name="blog_shortdesc" class="form-control"
                    value="{{$blogs->blog_shortdesc}}" />
                <br>
                <a href=""><button class="btn btn-secondary">Update Blog</button></a>

            </form>
        </div>
    </div>
</section>

@endsection