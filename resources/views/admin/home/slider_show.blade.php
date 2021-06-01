@extends('admin.admin_master')


@section('main-content')

    <div class="col-lg-10">
        @if( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
        @endif
        <a class="btn btn-success" href="{{ route('home.slider') }}">Add slider</a>
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Slider Table</h2>
            </div>
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $sliders as $slider )
                    <tr>
                        <td scope="row">{{ $loop->index+1 }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->content }}</td>
                        <td><img style="width: 60px;height: 60px;" src="{{ asset( $slider->image ) }}" alt=""></td>
                        <td><a class="btn btn-sm btn-primary" href="#">Edit</a><a class="btn btn-sm btn-danger" href="{{ route('slider.delete',$slider->id) }}">Delete</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
