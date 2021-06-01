@extends('admin.admin_master')


@section('main-content')

    <div class="col-lg-10">
        @if( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
        @endif
        <a class="btn btn-success" href="{{ route('home.create') }}">Add Discription</a>
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Home About Table</h2>
            </div>
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Short Discription</th>
                        <th scope="col">Long Discription</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $data as $about )
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->short_dis }}</td>
                            <td>{{ $about->long_dis }}</td>
                            <td><a class="btn btn-sm btn-primary" href="#">Edit</a><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
