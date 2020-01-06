@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show pots.</div>

                    <div class="card-body">
                        <table class="col-md-12 table float-right">
                            <thead>
                            <tr>

                                <th>Title</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>To</th>
                                <th>From</th>
                                <th>Tag</th>

                            </tr>
                            </thead>
                            <tbody>

                                        <th>{{$post->title}}</th>
                                        <th>{{$post->content}}</th>
                                        <th>{{$post->category->name}}</th>
                                        <th>{{$post->fromuser->name}}</th>
                                        <th>{{$post->touser->name}}</th>

                                        <th>
                                            @foreach($post->tags as $tag)
                                                {{$tag->name}}
                                            @endforeach
                                        </th>


                                                {{-- <form action="{{ route('post.show', ['id'=>$post->id]) }}">
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
                                                </form> --}}


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
