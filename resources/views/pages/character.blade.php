@extends('layouts.master')

@section('content')
    <h1>hello {{ $data['name'] }}</h1>

    <img src="http://render-eu.worldofwarcraft.com/character/{{ $data['thumbnail'] }}" alt="">


{{ dump($data) }}
@endsection