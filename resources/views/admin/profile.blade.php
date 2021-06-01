@extends('admin.admin_master')


@section('main-content')


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if( Session::has('success') )
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" class="form-control" value="{{ $profile['name'] }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" value="{{ $profile['email'] }}" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <input value="Update" class="btn btn-success" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
