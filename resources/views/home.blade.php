@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">Dashboard
                        @if(Auth::user()->last_auth) <p class="float-right">Your last login:{{Auth::user()->last_auth}}</p> @endif
                    </div>
                    <div class="card-body p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (Auth::user()->isActive == 0)
                            <div class="m-2" style="text-align: center; color: white;">
                                <h4 class="bg-danger text-center">Your account is not active,
                                    Make Contact with admin.</h4>
                            </div>
                            <br>
                        @else
                            <div class="container">
                                <div class="row">
                                    <a class="bg-success col-sm " href="{{ route('Posts') }}">
                                        <div style="font-size: 3em; color: white;">
                                            <i class="light far fa-envelope"></i>
                                            <p style="float: right">{{$posts->count()}}</p>
                                        </div>
                                    </a>
                                    <a class="bg-primary col-sm " href="{{ route('Categories') }}">
                                        <div style="font-size: 3em; color: white;">
                                            <i class="fas fa-list-ul"></i>
                                            <p style="float: right">{{$categories->count()}}</p>
                                        </div>
                                    </a>
                                    <a class="bg-danger col-sm " href="{{ route('Tags') }}">
                                        <div style="font-size: 3em; color: white;">
                                            <i class="fas fa-tags"></i>
                                            <p style="float: right">{{$tags->count()}}</p>
                                        </div>
                                    </a>
                                    @if(Auth::user()->isAdmin == 1)
                                        <a class="bg-info col-sm " href="{{ route('AdminRoles') }}">
                                            <div style="font-size: 3em; color: white;">
                                                <i class="fas fa-users-cog"></i>
                                                <p style="float: right">{{$users->count()-1}}</p>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                    </div>
                    @if($errors->any())
                        <div class="m-2" style="text-align: center; color: white;">
                            <h4 class="bg-danger text-center">{{$errors->first()}}</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    @if (count($inbox) > 0)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Your Inbox.
                            <span class="badge badge-pill badge-success">{{$number = count($count )}}</span>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Post title.</th>
                                <th scope="col">Post Content.</th>
                                <th scope="col">Post Category.</th>
                                <th scope="col">Post From.</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($posts as $post)
                                @if($post->to == Auth::user()->id)
                                    {{--                                @dd($post->user);--}}
                                    <tr>
                                        <th scope="row">{{$post->title}}</th>
                                        <th scope="row">{{$post->content}}</th>
                                        <th scope="row">{{$post->category->name}}</th>
                                        <th scope="row">{{$post->fromuser->name}}</th>
                                        <th scope="row">
                                            <form action="{{ route('post.destroy', ['id'=>$post->id]) }}"
                                                  class="float-left">
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </th>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @endif
@endsection
