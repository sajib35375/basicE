@extends('admin.admin_master')


@section('main-content')




    <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>All Category</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Brand-Name</th>
                                    <th>Brand-image</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($data as $brand)
                                    <tr>
                                        <td>{{ $data->firstItem() + $loop->index }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td><img style="height: 40px;width: 80px;" src="{{ asset($brand->brand_image) }}" alt=""></td>
                                        <td>{{ $brand->created_at->diffForHumans() }}</td>
                                        <td><a class="btn btn-sm btn-info" href="{{ route('brand.edit',$brand->id) }}">Edit</a><a class="btn btn-sm btn-danger" href="{{ route('brand.delete',$brand->id) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Brand</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="#">Brand-Name</label>
                                    <input name="brand_name" class="form-control" type="text">
                                    @error('brand_name')
                                       <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Brand-Image</label>
                                    <input name="brand_image" class="form-control-file" type="file">
                                    @error('brand_image')
                                       <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input value="Add" class="btn btn-sm btn-info" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
