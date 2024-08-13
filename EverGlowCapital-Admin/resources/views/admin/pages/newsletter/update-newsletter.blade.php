@extends('admin.layouts.app')
@section('title', 'Newsletter')    {{--page name--}}

@section('content')   {{--page content--}}
@section('page_section_name', 'NewsLetter Management')   <!-- Content Header (Page header) -->

@section('page_name', 'Add Newsletter')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        @if (session()->has('success'))
            <span class="alert alert-success">
                {{session()->get('success')}}
            </span>
        @endif
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="newsletter-image">
                <label class="form-label" for="newsletter_image">Newsletter Image</label>
                @error('newsletter_image')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="file" class="form-control" name="newsletter_image" id="newsletter_image">
            </div>
            <div class="newsletter-price">
                <label class="form-label" for="newsletter_price">Newsletter Price</label>
                @error('newsletter_price')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" class="form-control" name="newsletter_price" id="newsletter_price"
                    value="{{$newsletter->newsletter_price}}">
            </div>
            <div class="newsletter-heading">
                <label class="form-label" for="newsletter_heading">Newsletter Heading</label>
                @error('newsletter_heading')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" class="form-control" name="newsletter_heading" id="newsletter_heading"
                    value="{{$newsletter->newsletter_heading}}">
            </div>
            <div class="newsletter-title">
                <label class="form-label" for="newsletter_title">Newsletter Title</label>
                @error('newsletter_title')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" class="form-control" name="newsletter_title" id="newsletter_title"
                    value="{{$newsletter->newsletter_title}}">
            </div>
            <div class="newsletter-shortdesc">
                <label class="form-label" for="newsletter_shortdesc">Newsletter ShortDesc.</label>
                @error('newsletter_shortdesc')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <textarea name="newsletter_shortdesc" class="form-control" id="newsletter_shortdesc"
                    value="{{$newsletter->newsletter_shortdesc}}"></textarea>
            </div>
            <br>
            <a href="{{route("admin.newsletter.update", encrypt($newsletter->newsletter_id))}}">
                <button class="btn btn-dark" type="submit">Update Newsletter</button></a>
        </form>
    </div>
</section>

@endsection