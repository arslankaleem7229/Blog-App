@extends('layout')
@section('dashboard-content')
    <h1>Blog Post</h1>
    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">

            <strong> {{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif

    @if (Session::get('failure'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">

            <strong> {{ Session::get('failure') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>

    @endif


    <form action="{{ URL::to('store-blog-post') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Title</label>
            <input type="text" class="form-control" id="blogtitle" placeholder="Enter Blog title" name="blogtitle">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Description</label>
            <textarea class="form-control" name="blogdescription" id="blogdescription"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Category</label>
            <select class="form-control" name="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->id }}). {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop
