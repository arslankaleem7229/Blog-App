@extends('layout')
@section('dashboard-content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="project-info-box mt-0">
                    <h5>{{ $blogPost->title }}</h5>
                    <p class="mb-0">{{ $blogPost->details }}</p>
                </div>
            </div><!-- / column -->

            <div class="col-md-7">
                <img src="{{ $blogPost->featured_image_url }}" alt="project-image" class="rounded">
                <div class="project-info-box">
                    <p><b>Created :</b>{{ $blogPost->created_at }}</p>
                </div><!-- / project-info-box -->
            </div><!-- / column -->
        </div>
    </div>
@stop
