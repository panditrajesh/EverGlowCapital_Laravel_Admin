@extends('admin.layouts.app')
@section('title', 'Blog section')    {{--page name--}}

@section('content')   {{--page content--}}
@section('page_section_name', 'Blog Management')   <!-- Content Header (Page header) -->

@section('page_name', 'Blog List')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        @if (session()->has('success'))
            <span class="alert alert-primary">{{session()->get('success')}}</span>
        @endif
        <div class="blog-list">
            <div class="row border" style="height: 50px;">
                <div class="col-md">
                    #
                </div>
                <div class="col-md">
                    <b>Blog Title</b>
                </div>
                <div class="col-md">
                    <b>Blog Short Description</b>
                </div>
                <div class="col-md">
                    <b>Operations</b>
                </div>
            </div>
            @foreach ($blogs as $data)
                <div class="row border">
                    <div class="col-md">
                        {{$data->blog_id}}
                    </div>
                    <div class="col-md">
                        {{$data->blog_heading}}
                    </div>
                    <div class="col-md">
                        {{$data->blog_shortdesc}}
                    </div>
                    <div class="col-md">
                        <a class="btn btn-primary" href="{{route("admin.blog.edit", $data->blog_id)}}">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you want to delete?');"
                            href="{{route("admin.blog.delete", $data->blog_id)}}">Delete</a>
                    </div>
                </div>
            @endforeach
            <br>

        </div>
    </div>
</section>

@endsection