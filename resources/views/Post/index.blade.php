@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-2">
                    <div class="card-header mr-right ">Create Post.
                        <button class="btn btn-success float-right" onclick="myFunction()"><i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <form action="{{route('post.store')}}" method="get" id="myDIV" style="display:none">
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="col-md-4 ml-3 mt-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" aria-describedby="emailHelp"
                                       placeholder="Enter title" value="">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your data with
                                    anyone else.</small>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control" name="category_id" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row ">
                            <div class="col-md-4 ml-3">
                                <div class="card float-left mr-2">
                                    <div class="card-header float-right text-center ">User</div>
                                    <div class="card-header float-right">

                                        @foreach ($to as $to)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="to" type="radio" id="user"
                                                       value="{{$to->id}}">
                                                <label class="form-check-label"
                                                       for="inlineCheckbox1">{{$to->name}}</label>
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

                                <div class="card-header float-right">

                                    @foreach ($tags as $tag)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="tags[]"
                                                   value="{{$tag->id}}">
                                            <label class="form-check-label"
                                                   for="inlineCheckbox1">{{$tag->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="content">Description</label>
                            <textarea class="form-control" name="Message" rows="4" cols="8"> </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>


                </div>
                @if($posts->count() > 0)
                    <div class="card">
                        <div class="card-header mr-right">
                            <button type="button" id="buttoninbox" class="btn btn-info float-right"
                                    onclick="theFunction()">
                                Inbox
                            </button>
                            <button type="button" id="buttonsend" class="btn btn-info float-right mr-2"
                                    onclick="theFunction()">Send
                            </button>
                        </div>
                        <script>
                            function theFunction() {

                                var buttoninbox = document.getElementById("buttoninbox");
                                var buttonsend = document.getElementById("buttonsend");
                                var inbox = document.getElementById("inbox");
                                var send = document.getElementById("send");
                                var text = document.getElementById("text")
                                if (inbox.style.display === "none" && send.style.display === "block") {
                                    inbox.style.display = "block";
                                    send.style.display = "none";
                                    buttoninbox.style.display = "none";
                                    buttonsend.style.display = "block";
                                    text.valueOf("test");
                                } else {
                                    inbox.style.display = "none";
                                    send.style.display = "block";
                                    buttoninbox.style.display = "block";
                                    buttonsend.style.display = "none";
                                }
                            }

                        </script>
                        <div class="row ml-6">
                            <div class="col-md table" id="inbox" style="display: none">
                                <table class="col-md-12 table">
                                    <thead>
                                    <tr>
                                        {{--                        <th>Post id.</th>--}}
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>From</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($inbox as $post)
                                        <tr>
                                            <th>{{$post->title}}</th>
                                            <th>{{$post->content}}</th>
                                            <th>{{$post->fromuser->name}}</th>
                                            {{-- <th>{{$post->category->name}}</th> --}}
                                            <th>
                                                <form action="{{ route('post.show', ['id'=>$post->id]) }}">
                                                    <button type="submit" class="btn btn-warning">
                                                        <i class="far fa-eye"></i>
                                                    </button>
                                                </form>
                                            </th>
                                            <th>
                                                <form action="{{ route('post.edit', ['id'=>$post->id]) }}">
                                                    <button type="submit" class="btn btn-info">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                </form>
                                            </th>
                                            <th>
                                                <form action="{{ route('post.destroy', ['id'=>$post->id]) }}"
                                                      class="float-left">
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </th>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md table" id="send" style="display: none">
                                <table class="col-md-12 table float-right">
                                    <thead>
                                    <tr>

                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>To</th>
                                        <th>Tags</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach ($send as $post)
                                        <tr>
                                            <th>{{$post->title}}</th>
                                            <th>{{$post->content}}</th>
                                            <th>{{$post->touser->name}}</th>
                                            <th>
                                                {{ count($post->tags) }}

                                                {{--                                            @foreach($post->tags as $tag)--}}
                                                {{--                                                {{$tag->name}}--}}
                                                {{--                                            @endforeach--}}

                                            </th>

                                            <th>
                                                <form action="{{ route('post.show', ['id'=>$post->id]) }}">
                                                    <button type="submit" class="btn btn-warning">
                                                        <i class="far fa-eye"></i>
                                                    </button>
                                                </form>
                                            </th>
                                            <th>
                                                <form action="{{ route('post.edit', ['id'=>$post->id]) }}">
                                                    <button type="submit" class="btn btn-info">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                </form>
                                            </th>
                                            <th>
                                                <form action="{{ route('post.destroy', ['id'=>$post->id]) }}">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
