@extends('admin.admin_master')


@section('main-content')

    <div class="col-lg-10">
        @if( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
        @endif
        <a class="btn btn-success" href="{{ route('contact.create') }}">Add Contact</a>
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Contact us Table</h2>
            </div>
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $contacts as $contact )
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td><a class="btn btn-sm btn-primary" href="#">Edit</a><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
