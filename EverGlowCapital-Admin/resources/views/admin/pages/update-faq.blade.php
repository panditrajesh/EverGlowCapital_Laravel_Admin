@extends('admin.layouts.app')
@section('title', 'FAQ section')    {{--page name--}}

@section('content')   {{--page content--}}

@section('page_section_name', 'FAQ Management')   <!-- Content Header (Page header) -->
@section('page_name', 'Add FAQ')   <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="faq-section">
            <br>
            <form action="" method="post">
                @csrf
                <!-- hiddden id -->
                <input type="hidden" name="hidden_id" value="{{$faqs->faq_id}}">
                <!-- Name input -->
                <label class="form-label" for="question">Question</label>
                <br>
                @error('question')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="question" name="question" class="form-control" value="{{$faqs->question}}" />

                <label class="form-label" for="answer">Answer</label>
                <br>
                @error('answer')
                    <span class="txt text-danger">* {{$message}}</span>
                @enderror
                <input type="text" id="answer" name="answer" class="form-control" value="{{$faqs->answer}}" />
                <br>

                <a href="{{url("everglow-capital/admin/faq/edit/" . $faqs->faq_id)}}"><button
                        class="btn btn-secondary">Update</button></a>
            </form>
        </div>
    </div>
    <div class="faqs-list">

    </div>
    </div>
</section>

@endsection