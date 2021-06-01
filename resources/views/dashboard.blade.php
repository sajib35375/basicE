<x-app-layout>
    <x-slot name="header">
        <h2>User Table <span class="badge badge-danger">{{ count($user) }}</span></h2>
        <b class="float-right">{{ Auth::user()->name }}</b>

    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created_at</th>
                    </tr>
                    @php($i=1)
                    @foreach($user as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
