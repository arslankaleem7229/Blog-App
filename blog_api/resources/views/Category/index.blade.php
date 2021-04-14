@extends('layout')
@section('dashboard-content')
    @if (Session::get('deleted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">

            <strong> {{ Session::get('deleted') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif

    @if (Session::get('delete-failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">

            <strong> {{ Session::get('delete-failed') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>

    @endif



    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Categories
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th><a style="color: red;" href="{{ URL::to('delete-all-category') }}"
                                    onclick="allDelete()">Delete all
                                    categories</a>
                            </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>

                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ URL::to('edit-category') }}/{{ $category->id }}"
                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                    |
                                    <a href="{{ URL::to('delete-category') }}/{{ $category->id }}"
                                        class="btn btn-outline-danger btn-sm" onclick="checkDelete()">Delete</a>
                                </td>
                            </tr>


                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function checkDelete() {
            var check = confirm('Are you sure you want to delete this?');
            if (check) {
                return true;
            } else {
                return false;
            }

        }

        function allDelete() {
            var check = confirm('Are you sure you want to delete all entries?');
            if (check) {
                return true;
            } else {
                return false;
            }

        }

    </script>

@stop
