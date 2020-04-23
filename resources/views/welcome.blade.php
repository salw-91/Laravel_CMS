@extends('layouts.app')
@section('content')
    <div class="flex-center ">
        <div class="content">
            <div class="title m-b-md">
                HI
                @auth()
                    {{$user->name}}
                @endauth
            </div>
        </div>
    </div>
@endsection
