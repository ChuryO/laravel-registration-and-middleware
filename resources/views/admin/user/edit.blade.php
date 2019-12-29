@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit user: {{ $user->name }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')


                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    @can('admin')
                                        <th scope="col">Groups</th>
                                    @endcan
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ $user->email }}" required
                                               autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </td>
                                    @can('admin')
                                        <td>
                                            @foreach($roles as $role)
                                                <div class="form-check">
                                                    <label>
                                                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                                               @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                                        {{ $role->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </td>
                                    @endcan
                                    <td>
                                        <a href="{{ route('admin.user.create')}}">
                                            <button type="submit" class="btn btn-success float-left">Submit</button>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
