@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit profile</div>
                    <div class="card-body">
                        <form action="{{ route('profile.update', ['id'=>$user->id]) }}">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            <br>
                            <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            <br>

                            {{-- only admin --}}
                            {{-- dont work good. --}}
                            {{-- is Admin --}}
                            @if (Auth::user()->isAdmin == 0)
                                <th><i class="far fa-user"> User</i></th>
                            @else
                                <th><i class="fas fa-users-cog"> Admin</i></th>
                                <br>

                                @if (Auth::user()->isAdmin == 0)
                                    <input type="radio" id="isAdmin0" name="isAdmin" value="0" checked> No<br>
                                    <input type="radio" id="isAdmin1" name="isAdmin" value="1"> Yes<br>
                                @else
                                    <input type="radio" id="isAdmin0" name="isAdmin" value="0"> No<br>
                                    <input type="radio" id="isAdmin1" name="isAdmin" value="1" checked> Yes<br>
                                @endif

                                <br>
                                {{-- isActive --}}
                                @if (Auth::user()->isActive == 0)
                                    <th><i class="fas fa-times"> Not Active</i></th>
                                @else
                                    <th><i class="fas fa-check"> Active</i></th>
                                @endif
                                <br>
                                <label for="isActive">{{ __('Active???') }}</label>
                                <br>
                                @if (Auth::user()->isActive == 0)
                                    <input type="radio" id="isActive0" name="isActive" value="0" checked> No<br>
                                    <input type="radio" id="isActive1" name="isActive" value="1"> Yes<br>
                                @else
                                    <input type="radio" id="isActive0" name="isActive" value="0"> No<br>
                                    <input type="radio" id="isActive1" name="isActive" value="1" checked> Yes<br>
                                @endif
                            @endif
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
