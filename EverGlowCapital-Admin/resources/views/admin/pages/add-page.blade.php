@extends('admin.layouts.app')
@section('title', 'Site Page') {{-- page name --}}

@section('content') {{-- page content --}}

@section('page_name', 'Add Page') <!-- Content Header (Page header) -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="page-fields">
            @if (session()->has('success'))
                <span class="alert alert-success">
                    {{ session()->get('success') }}
                </span>
            @endif
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- page status --}}
                <label for="page_status">Status</label>
                <select class="form-select" id="page_status" name="page_status" aria-label="">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                {{-- page name --}}
                <label class="form-label" for="page_name">Page Name</label>
                @error('page_name')
                    <span class="text text-danger">* {{ $message }}</span>
                @enderror
                <input type="text" id="page_name" name="page_name" class="form-control"
                    value="{{ old('page_name') }}" />
                {{-- featured image --}}
                <label class="form-label" for="featured_image">Featured Image</label>
                @error('featured_image')
                    <span class="text text-danger">* {{ $message }}</span>
                @enderror
                <input type="file" id="featured_image" name="featured_image" class="form-control" />
                {{-- banner image --}}
                <label class="form-label" for="banner_image">banner Image</label>
                @error('banner_image')
                    <span class="text text-danger">* {{ $message }}</span>
                @enderror
                <input type="file" id="banner_image" name="banner_image" class="form-control" />
                {{-- page short desc. --}}
                <label class="form-label" for="page_shortdesc">Page Short Desc.</label>
                @error('page_shortdesc')
                    <span class="text text-danger">* {{ $message }}</span>
                @enderror
                <input type="text" id="page_shortdesc" name="page_shortdesc" class="form-control"
                    value="{{ old('page_shortdesc') }}" />
                {{-- page desc. --}}
                <label class="form-label" for="page_desc">Page Desc.</label>
                @error('page_desc')
                    <span class="text text-danger">* {{ $message }}</span>
                @enderror
                <textarea name="page_desc" id="page_desc" placeholder="Enter Page Description" value="{{ old('page_desc') }}"></textarea>

                <br>
                <a href="{{ route('add.page') }}"><button class="btn btn-secondary">Add Page</button></a>
        </div>
        </form>
    </div>
</section>

@endsection
