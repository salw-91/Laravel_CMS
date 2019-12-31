@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update profile</div>
                    <div class="card-body">
                        <th scope="row">Hi {{$user->name}}.</th>
                        <br>
                        <form action="{{route('porfile.edit' , ['id' => $user->id ])}}">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            <br>
                            <input type="text" class="form-control" name="name" value="{{$user->email}}">
                            <br>
                            <a href="{{ route('profile.edit', ['id' =>$user->id]) }}">Edit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
