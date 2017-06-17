@extends('layouts.master')

@section('content')
<h1>your account</h1>
<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
            @if($user->characters)
                @foreach( $user->characters as $character)
                   <h2> {{ $character->name }}</h2>
                   <p>Realm : {{ $character->realm }}</p>
                   <p>level : {{ $character->level }}</p>
                @endforeach
                @endif
            </div>
            <div class="col-md-4">
            @foreach( $user->guilds as $guild)
                   <h2> {{ $guild->name }}</h2>
                 
                @endforeach
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Web Security</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>

@endsection