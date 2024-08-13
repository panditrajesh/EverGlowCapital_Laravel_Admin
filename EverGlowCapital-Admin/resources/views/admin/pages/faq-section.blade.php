@extends('admin.layouts.app')
@section('title', 'FAQ section')    {{--page name--}}

@section('content')   {{--page content--}}

@section('page_section_name', 'FAQ Management')   <!-- Content Header (Page header) -->
@section('page_name', 'Add FAQ')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">

        @if (session()->has('message'))
            <span class="alert alert-success">
                {{session()->get('message')}}
            </span>
        @endif
        <div class="faq-section">
            <br>
            <form action="" method="post">
                @csrf
                <!-- Name input -->
                <label class="form-label" for="question">Question</label>
                <br>
                @error('question')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="question" name="question" class="form-control" />

                <label class="form-label" for="answer">Answer</label>
                <br>
                @error('answer')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="answer" name="answer" class="form-control" />
        </div>
        <br>

        <a href="{{route('admin.faq')}}"><button class="btn btn-primary">Add</button></a>

        </form>
    </div>
    <div class="faqs-list">

    </div>
    </div>
</section>

@endsection