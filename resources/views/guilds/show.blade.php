@extends('layouts.master')

@section('content')
<div class="container">
        <h1>{{ $guild->name }}</h1>
        <p>{{ $guild->body }}</p>

</div>

@endsection