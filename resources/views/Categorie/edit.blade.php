@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit categorie</div>

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

                        <form action="{{route('categorie.update', ['id'=>$categorie->id])}}" method="get" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp"
                            placeholder="Enter name hier." value="{{$categorie->name}}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your data with
                                    anyone else.</small>
                                <br>
                                <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
