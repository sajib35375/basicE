<x-app-layout>
    <x-slot name="header">
        <h2>Category Table </h2>


    </x-slot>

    <div class="py-12">



        <div class="row">

            <div style="display: block;margin: auto;" class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Brand</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brand.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="#">Brand-Name</label>
                                <input name="brand_name" value="{{ $edit_data->brand_name }}" class="form-control" type="text">
                                @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input name="old_value" value="{{ $edit_data->brand_image }}"  type="hidden">
                                <img src="{{ asset($edit_data->brand_image) }}" style="width: 200px;height: 200px;" alt="">
                                <label for="#">Brand-Image</label>
                                <input name="brand_image" value="{{ $edit_data->brand_image }}" class="form-control-file" type="file">
                                @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input value="Update" class="btn btn-sm btn-info" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</x-app-layout>
