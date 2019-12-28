@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">
                        <form action="{{ route('profile.edit', ['id'=>$user->id]) }}">
                            <th scope="row">Your name is: {{$user->name}}.</th>
                            <br>
                            <th scope="row">Your email is: {{$user->email}}.</th>
                            <br>
                            <button type="submit" class="btn btn-primary mt-3 ">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
