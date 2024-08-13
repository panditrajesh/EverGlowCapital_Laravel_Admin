@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')

<!-- Content Header (Page header) -->
@section('page_name', 'Dashboard')
<!-- /.content-header -->


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div>
                    <span>
                        <h2>Hello {{auth()->user()->name}} !!</h2>
                        Welcome to Everglow Admin Panel.
                    </span>
                    <div class="total-counts">
                        <!-- count of records of different section -->
                        <br>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total Registered Users</h5>
                                <h3 class="card-text text text-success">
                                    <b>{{$users_count}}</b>
                                </h3>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">How many users have already contacted?</h5>
                                <h3 class="card-text text text-success">
                                    <b>{{$contacts_count}}</b>
                                </h3>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total count of blog posted</h5>
                                <h3 class="card-text text text-success">
                                    <b>{{$blogs_count}}</b>
                                </h3>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total count of Testimonial posted</h5>
                                <h3 class="card-text text text-success">
                                    <b>{{$testimonials_count}}</b>
                                </h3>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total count of FAQ posted</h5>
                                <h3 class="card-text text text-success">
                                    <b>{{$faqs_count}}</b>
                                </h3>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total count of Benefits posted</h5>
                                <h3 class="card-text text text-success">
                                    <b>{{$benefits_count}}</b>
                                </h3>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total count of Newsletter posted</h5>
                                <h3 class="card-text text text-success">
                                    <b>{{$newsletters_count}}</b>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection