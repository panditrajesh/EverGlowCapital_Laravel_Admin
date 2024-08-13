@extends('admin.layouts.app')
@section('title', 'FAQ section')    {{--page name--}}

@section('content')   {{--page content--}}
@section('page_section_name', 'FAQ Management')   <!-- Content Header (Page header) -->
@section('page_name', 'FAQ List')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        @if (session()->has('message'))
            <span class="alert alert-primary">{{session()->get('message')}}</span>
        @endif
        <div class="faq-list">
            <div class="row border" style="height: 50px;">
                <div class="col-md">
                    #
                </div>
                <div class="col-md">
                    <b>Question</b>
                </div>
                <div class="col-md">
                    <b>Answer</b>
                </div>
                <div class="col-md">
                    <b>Operations</b>
                </div>
            </div>
            @foreach ($faqs as $data)
                <div class="row border" style="height: 50px;">
                    <div class="col-md">
                        {{$data->faq_id}}
                    </div>
                    <div class="col-md">
                        {{$data->question}}
                    </div>
                    <div class="col-md">
                        {{$data->answer}}
                    </div>
                    <div class="col-md">
                        <a class="btn btn-primary"
                            href="{{url("everglow-capital/admin/faq/edit/" . $data->faq_id)}}">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you want to delete?');"
                            href="{{url("everglow-capital/admin/faq/delete/" . $data->faq_id)}}">Delete</a>
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