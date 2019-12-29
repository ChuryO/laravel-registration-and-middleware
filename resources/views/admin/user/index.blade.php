@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Users Management</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Groups</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                    <td>
                                        @can('manage-users')
                                            <a href="{{ route('admin.user.edit',  $user->id) }}">
                                                <button type="button" class="btn btn-primary float-left mx-1">Edit
                                                </button>
                                            </a>
                                        @endcan

                                    <!--TODO Add client auto/manual -->
                                        {{--                                        <a href="{{ route('admin.user.create')}}">--}}
                                        {{--                                            <button type="button" class="btn btn-success float-left mx-1">Add *not ready--}}
                                        {{--                                                yet--}}
                                        {{--                                            </button>--}}
                                        {{--                                        </a>--}}
                                    <!--TODO block client auto/manual -->
                                        {{--                                        <a href="{{ route('admin.user.create')}}">--}}
                                        {{--                                            <button type="button" class="btn btn-danger float-left mx-1">Block *not ready yet</button>--}}
                                        {{--                                        </a>--}}
                                    <!--TODO logic-->
                                        @can('admin')
                                            <form method="POST" action="{{ route('admin.user.destroy', $user) }}"
                                                  class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mx-1">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
