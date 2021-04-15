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

    <form action="{{ URL::to('store-blog-post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="blogtitle">Blog Title</label>
            <input type="text" class="form-control" id="blogtitle" placeholder="Enter Blog title" name="blogtitle">
        </div>
        <div class="form-group">
            <label for="blogdescription">Blog Description</label>
            <textarea class="form-control" id="editor1" name="blogdescription" id="blogdescription"></textarea>
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
                onchange="loadphoto(event)">
            <br>
        </div>
        <div id="imageViewer" style="visibility: hidden;width: 0px;height: 0px;">
            <img id="imagePreview" height="100" width="100">
        </div>
        <button type=" submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>

    </form>

    <script>
        function loadphoto(event) {
            document.getElementById('imageViewer').setAttribute("style", "width:100px");
            document.getElementById('imageViewer').style.visibility = "visible";
            document.getElementById('imageViewer').setAttribute("style", "height:100px");

            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);

        }

    </script>

@stop
