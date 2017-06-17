@extends('layouts.master')

@section('content')
<div class="container">

    @foreach($guilds as $guild)
        <div class="row">
            <div class="col-sm-3">
                <img src="http://placehold.it/200" alt="">
            </div>
            <div class="col-sm-9">
            </div>
                <h2><a href="{{ action('GuildsController@show', [$guild->id]) }}">{{ $guild->name }}</a></h2>
                <p>{{ $guild->body }}</p>
        </div>

    @endforeach

</div>


@endsection