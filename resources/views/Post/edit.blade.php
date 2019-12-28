@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create pots.</div>

                    <div class="card-body">

                        @if(count($errors)>0)
                            <ul class="navbar-nav mr-auto">
                                @foreach($errors->all() as $error)
                                    <li class="nav-item active">
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        {{-- {{ dd($post->id)}} --}}
                        <form action="{{route('post.update', ['id'=>$post->id])}}" method="get"
                              enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="row">
                                <div class="col-md-4 ml-3 mt-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp"
                                           placeholder="Enter title" value="{{$post->title}}">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your data with
                                        anyone else.</small>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="category_id" id="category">
                                        @foreach ($categories as $categories)
                                            <option value="{{$categories->id}}"
                                                    @if($post->category->id == $categories->id) selected=selected @endif>{{$categories->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-6 ml-3">
                                    <div class="card float-left">
                                        <div class="card-header float-right text-center ">Send to</div>
                                        <div class="float-right">
                                            @foreach ($users as $user)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="to" type="radio" id="user"
                                                           value="{{$user->id}}"
                                                           @if($post->to == $user->id) checked=checked @endif>

                                                    <label class="form-check-label"
                                                           for="inlineCheckbox1">{{$user->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                {{-- class="card-header mr-right " --}}
                                <div class="card float-right">
                                    <div class="card-header float-right text-center">Tag
                                        <a href="{{ route('Tags') }}" class="btn btn-success float-right"><i
                                                class="fas fa-plus "></i></a>
                                    </div>
                                    <div class="float-right">

                                        @foreach ($tags as $tags)
                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="checkbox" name="tags[]"
                                                       value="{{$tags->id}}"
                                                       @if($tags->id == $tag->id) checked=checked @endif
                                                >
                                                <label class="form-check-label" for="inlineCheckbox1">
                                                    {{$tags->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ml-3 mr-3">
                                <label for="content">Description</label>
                                <textarea class="form-control" name="content" rows="4"
                                          cols="8">{{$post->content}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
