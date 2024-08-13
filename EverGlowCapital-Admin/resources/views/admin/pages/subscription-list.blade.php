@extends('admin.layouts.app')
@section('title', 'Subscription section')    {{--page name--}}

@section('content')   {{--page content--}}

@section('page_section_name', 'Subscription Management')   <!-- Content Header (Page header) -->
@section('page_name', 'Subscriptions List')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        @if (session()->has('success'))
            <span class="alert alert-success">{{session()->get('success')}}</span>
        @endif
        <div class="subscription-list">
            <div class="row border" style="height: 50px;">
                <div class="col-md">
                    #
                </div>
                <div class="col-md">
                    <b>Subscription Title</b>
                </div>
                <div class="col-md">
                    <b>Subscription Short Desc.</b>
                </div>
                <div class="col-md">
                    <b>Operations</b>
                </div>
            </div>
            @foreach ($subscriptions as $subscription)
                <div class="row border">
                    <div class="col-md">
                        {{$subscription->subscription_id}}
                    </div>
                    <div class="col-md">
                        {{$subscription->subscription_heading}}
                    </div>
                    <div class="col-md">
                        {{$subscription->subscription_para}}
                    </div>
                    <div class="col-md">
                        <a class="btn btn-primary"
                            href="{{route("admin.subscription.edit", $subscription->subscription_id)}}">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you want to delete?');"
                            href="{{route("admin.subscription.delete", $subscription->subscription_id)}}">Delete</a>
                    </div>
                </div>
            @endforeach
            <br>

        </div>
    </div>
</section>

@endsection