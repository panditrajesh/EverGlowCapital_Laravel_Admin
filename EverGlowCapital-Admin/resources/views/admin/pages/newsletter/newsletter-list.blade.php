@extends('admin.layouts.app')
@section('title', 'Newsletter')    {{--page name--}}

@section('content')   {{--page content--}}
@section('page_section_name', 'Newsletter Management')   <!-- Content Header (Page header) -->

@section('page_name', 'Newsletter List')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        @if (session()->has('success'))
            <span class="alert alert-success">{{session()->get('success')}}</span>
        @endif
        <div class="newsletter-list">
            @foreach ($newsletters as $data)
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('uploads/' . $data->newsletter_image)}}" width="80px" height="120px"
                        class="card-img-top" alt="img">
                    <p>Price:
                        <b>
                            {{$data->newsletter_price}}
                        </b>
                    </p>
                    <div class="card-body">
                        <p class="">{{$data->newsletter_heading}}</p>

                        <h2><b>{{$data->newsletter_title}}</b></h2>
                        <p class="card-text">{{$data->newsletter_shortdesc}}</p>
                        <a href="{{route("admin.newsletter.edit", encrypt($data->newsletter_id))}}"
                            class="btn btn-secondary">Edit</a>
                        <a href="{{route("admin.newsletter.delete", encrypt($data->newsletter_id))}}"
                            class="btn btn-danger">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection