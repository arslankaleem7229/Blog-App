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

    <form action="{{ URL::to('update-blog-post') }}/{{ $blogPost->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="blogtitle">Blog Title</label>
            <input type="text" class="form-control" id="blogtitle" value="{{ $blogPost->title }}"
                placeholder="Enter Blog title" name="blogtitle">
        </div>
        <div class="form-group">
            <label for="blogdescription">Blog Description</label>
            <textarea class="form-control" id="editor1" name="blogdescription"
                id="blogdescription">{{ $blogPost->details }}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Blog Category</label>
            <select class="form-control" name="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->id }}). {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="featuredphoto">Select Featured photo</label>
            <input style="border: none;" type="file" name="featuredphoto" id="" class="form-control"
                onchange="loadphoto(event)" value="{{ $blogPost->featured_image_url }}">
            <br>
        </div>
        <div id="imageViewer">
            <img id="imagePreview" src="{{ $blogPost->featured_image_url }}" height="100" width="100">
        </div>
        <button type=" submit" class="btn btn-primary" style="margin-top: 10px;">Update</button>

    </form>

    <script>
        function loadphoto(event) {

            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);

        }

    </script>

@stop
