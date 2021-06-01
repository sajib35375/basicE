@extends('admin.admin_master')


@section('main-content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('update.password') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="#">Old Password</label>
                    <input name="old_password" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="#">New Password</label>
                    <input name="password" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="#">Confirm Password</label>
                    <input name="password_confirmation" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <input value="update" class="btn btn-sm btn-success" type="submit">
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
