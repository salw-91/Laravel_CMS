@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$user->name}} Profile</div>
                    <div class="card-body">
                        <form action="{{ route('AdminRole.update', ['id'=>$user->id]) }}">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            <br>
                            <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            <br>

                            @if ($user->isAdmin == 0)
                                <th><i class="far fa-user"> User</i></th>
                                <br>
                            @else
                                <th><i class="fas fa-users-cog"> Admin</i></th>
                                <br>
                            @endif

                            @if ($user->isAdmin == 0)
                                <input type="radio" name="isAdmin" value="0" checked> No<br>
                                <input type="radio" name="isAdmin" value="1"> Yes<br>
                            @else
                                <input type="radio" name="isAdmin" value="0"> No<br>
                                <input type="radio" name="isAdmin" value="1" checked> Yes<br>
                            @endif

                            <br>
                            {{-- isActive --}}
                            @if ($user->isActive == 0)
                                <th><i class="fas fa-times"> Not Active</i></th>
                            @else
                                <th><i class="fas fa-check"> Active</i></th>
                            @endif
                            <br>
                            @if ($user->isActive == 0)
                                <input type="radio" id="isActive0" name="isActive" value="0" checked> No<br>
                                <input type="radio" id="isActive1" name="isActive" value="1"> Yes<br>
                            @else
                                <input type="radio" id="isActive0" name="isActive" value="0"> No<br>
                                <input type="radio" id="isActive1" name="isActive" value="1" checked> Yes<br>
                            @endif

                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
