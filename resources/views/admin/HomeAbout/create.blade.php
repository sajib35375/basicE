@extends('admin.admin_master')


@section('main-content')

    <div class="col-lg-10">
        <a class="btn btn-sm btn-info" href="{{ route('home.about') }}">Back</a>
        @if( Session::has('success') )
            <p class="alert alert-success">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button></p>
        @endif
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>About Section</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('home.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="#">Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="#">Short Discription</label>
                        <textarea name="short_dis" class="form-control" type="text" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="#">Long Discription</label>
                        <textarea name="long_dis" class="form-control"></textarea>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                        <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>




    </div>


@endsection
