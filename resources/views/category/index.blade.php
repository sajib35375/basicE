<x-app-layout>
    <x-slot name="header">
        <h2>Category Table </h2>


    </x-slot>

    <div class="py-12">
        <div class="container">
            @if($errors->any())
                <p class="text-danger">{{ $errors->first() }}</p>
                @endif
            @if(Session::has('success'))
                <p class="text-success">{{ Session::get('success') }}</p>
                @endif

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
                                    <th>User-id</th>
                                    <th>Name</th>
                                    <th>slug</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
{{--                                @php($i=1)--}}
                                @foreach($cat as $data)
                                <tr>
                                    <td>{{ $cat->firstItem() + $loop -> index }}</td>
                                    <td>{{ $data->nam->name }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->slug }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td><a class="btn btn-sm btn-info" href="#">Edit</a><a class="btn btn-sm btn-danger" href="{{ route('category.softdelete',$data->id) }}">Trash</a></td>
                                </tr>
                                @endforeach
                            </table>
                            {{ $cat->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="#">Name</label>
                                    <input name="name" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <input value="Add" class="btn btn-sm btn-info" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

{{--            Trash--}}
                <div class="py-12">
                    <div class="container">


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
                                                <th>Name</th>
                                                <th>User</th>
                                                <th>slug</th>
                                                <th>Created_at</th>
                                                <th>Action</th>
                                            </tr>
                                            {{--                                @php($i=1)--}}
                                            @foreach($trash as $data)
                                                <tr>
                                                    <td>{{ $trash->firstItem() + $loop -> index }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->nam->name }}</td>
                                                    <td>{{ $data->slug }}</td>
                                                    <td>{{ $data->created_at }}</td>
                                                    <td><a class="btn btn-sm btn-info" href="{{ route('category.restore',$data->id) }}">Restore</a><a class="btn btn-sm btn-danger" href="{{ route('category.delete',$data->id) }}">Permanently Delete</a></td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        {{ $trash->links() }}
                                    </div>
                                </div>
                            </div>

                        </div>


        </div>
    </div>
</x-app-layout>
