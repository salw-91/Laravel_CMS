@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">

                        <th scope="row">Your name is: {{$user->name}}.</th>
                        <br>
                        <th scope="row">Your email is: {{$user->email}}.</th>
                        <br>
                        <button class="EditProfile disable-btn btn btn-warning col-md-6 mr-2"
                                onclick="myFunction()">Update
                        </button>
                        <div style="display:none" id="myDIV">
                            <hr>
                            <div class="card-body">
                                <form action="{{ route('profile.update', ['id'=>$user->id]) }}">
                                    <p>Name</p>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    <br>
                                    <p>Email</p>
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                                    <br>
                                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
