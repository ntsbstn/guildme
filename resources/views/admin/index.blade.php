@extends('layouts.master')

@section('content')
<h1>Admin page</h1>
<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <a href="{{ route('update-servers') }}">Update servers</a>
        </div>
    </div>
</section>

@endsection