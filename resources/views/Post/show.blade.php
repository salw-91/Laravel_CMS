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
                                <th>category</th>
                                <th>to</th>
                                <th>from</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Tag</th>

                            </tr>
                            </thead>
                            <tbody>

                                        <th>{{$post->title}}</th>
                                        <th>{{$post->content}}</th>
                                        <th>{{$post->category->name}}</th>
                                        <th>{{$post->user->name}}</th>
                                        <th>{{Auth::user()->name}}</th>
                                        <th>{{$post->created_at}}</th>
                                        <th>{{$post->updated_at}}</th>
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
