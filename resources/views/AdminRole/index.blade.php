@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mr-right">Admin Role.</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email & Last sign in</th>
                            <th scope="col">Account</th>
                            <th scope="col">Active</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <th scope="row">{{$user->name}}</th>
                                <th scope="row">{{$user->email}} <br><p>{{ $user->last_auth}}</p></th>
                                @if ($user->isAdmin == 0)
                                    <th>user</th>
                                @else
                                    <th>admin</th>
                                @endif
                                @if ($user->isActive == 1)
                                    <th>Active</th>
                                @else
                                    <th>Not Active</th>
                                @endif
                                <th>
                                    <form action="{{ route('profile.edit', ['id'=>$user->id]) }}">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form>
                                </th>
                                <th>
                                    <form action="{{ route('profile.destroy', ['id'=>$user->id]) }}">
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </th>
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
