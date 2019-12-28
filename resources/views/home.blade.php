@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body p-0">
                        @if($errors->any())
                            <div style="text-align: center">
                                <h1 class="btn btn-danger btn-lg text-center">{{$errors->first()}}</h1>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{ dd($user)}} --}}

                        @if (Auth::user()->isActive == 0)
                            Your account is not active.
                            <br>
                            Make Contact with admin.
                            <br>
                        @endif
                        <div class="container">
                            <div class="row">
                                <a class="bg-success col-sm " href="{{ route('Posts') }}">
                                    <div style="font-size: 3em; color: white;">
                                        <i class="light far fa-envelope"></i>
                                        <p style="float: right">{{$posts->count()}}</p>
                                    </div>
                                </a>
                                <div class="col-sm bg-primary" style="font-size: 3em; color: white;">
                                    <i class="fas fa-list-ul"></i>
                                    <p style="float: right">{{$categories->count()}}</p>
                                </div>
                                <div class="col-sm bg-danger" style="font-size: 3em; color: white;">
                                    <i class="fas fa-tags"></i>
                                    <p style="float: right">{{$tags->count()}}</p>
                                </div>
                                <div class="col-sm bg-info" style="font-size: 3em; color: white;">
                                    <i class="fas fa-users"></i>
                                    <p style="float: right">{{$user->count()}}</p>
                                </div>
                            </div>
                        </div>

                        {{--                        Hi {{$user->name}} ,You are logged in!--}}
                        {{--                        <p>Last sign in at {{ auth()->user()->last_auth}}</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if (count($posts))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Your Inbox.
                            <span class="badge badge-pill badge-success">{{$number = count($count )}}</span>
                            <button type="button" id="button" class="btn btn-danger float-right" onclick="myFunction()">
                                X
                            </button>
                        </div>
                        <script>
                            function myFunction() {
                                var x = document.getElementById("myDIV");
                                var button = document.getElementById("button");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                    button.styleclass = "btn btn-danger float-right";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                        </script>
                        <table class="table" id="myDIV">
                            <thead>
                            <tr>
                                <th scope="col">Post title.</th>
                                <th scope="col">Post Content.</th>
                                <th scope="col">Post Category.</th>
                                <th scope="col">Post From.</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($posts as $post)
                                @if($post->to == Auth::user()->id)
                                    <tr>
                                        <th scope="row">{{$post->title}}</th>
                                        <th scope="row">{{$post->content}}</th>
                                        <th scope="row">{{$post->category->name}}</th>
                                        <th scope="row">{{$post->from}}</th>

                                        @endif
                                        @endforeach
                                    </tr>
                    </div>
                </div>
            </div>
        </div>

        </div>
    @endif
@endsection
