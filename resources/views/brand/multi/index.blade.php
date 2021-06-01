@extends('admin.admin_master')


@section('main-content')



        <div class="row">
            <div class="col-md-8">
                @if( Session::has('success') )
                    <p class="text-success">{{ Session::get('success') }}</p>
                    @endif
                @if($errors->any())
                    {{ $errors->first() }}
                    @endif
                <div class="card">
                    <div class="card-header">
                        <h3>All Photo</h3>
                    </div>
                   <div class="row">
                       @foreach($all_pic as $pic)
                           <div class="col-md-4">
                               <div class="card">
                                   <img style="width: 100px;height: 100px;" src="{{ asset($pic->multi_image) }}" alt="">
                               </div>
                           </div>

                       @endforeach
                   </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Brand</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('multi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="#">Multi_Image</label>
                                <input name="multi_image[]" class="form-control-file" type="file" multiple="">
                                @error('multi_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input  class="btn btn-sm btn-info" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



@endsection
