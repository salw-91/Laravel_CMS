@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-2">
                    <div class="card-header">Create Categorie.
                        <button type="submit" class="btn btn-success float-right" onclick="myFunction()"><i class="fas fa-plus"></i></button>
                    </div>
                    <script>
                        function myFunction() {
                            var x = document.getElementById("myDIV");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        }
                    </script>
                    @if(count($errors)>0)
                        <ul class="navbar-nav mr-auto">
                            @foreach($errors->all() as $error)
                                <li class="nav-item active">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{route('categorie.store')}}" method="get" enctype="multipart/form-data" id="myDIV" style="display:none">
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="col-md-4 m-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control col" name="name" aria-describedby="emailHelp"
                                       placeholder="Enter name hier.">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your data with
                                    anyone else.</small>
                            </div>
                            <div class="col-md-2 mt-5">
                                <button type="submit" class="btn btn-primary col">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card">
                <div class="card-header mr-right">Categorie.</div>


                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-md-10">Categorie Name</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{$category->name}}</th>

                                <th>
                                    <form action="{{ route('categorie.edit', ['id'=>$category->id]) }}">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form>
                                </th>
                                <th>
                                    <form action="{{ route('categorie.destroy', ['id'=>$category->id]) }}">
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
