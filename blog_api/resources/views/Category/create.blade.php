@extends('layout')
@section('dashboard-content')
    <h1>Create Category Form</h1>
    <form>
        <div class="form-group">
            <label for="CategoryName">Category Name</label>
            <input type="text" class="form-control" id="categoryname1" aria-describedby="categoryHelp"
                placeholder="Category Name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop
