@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit user: {{ $user->name }}</div>

                    <div class="card-body">
                        <h3 class="text-center text-danger">You do not have access to user manipulate</h3>
                        <a class="my-3" href="{{ route('admin.user.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
