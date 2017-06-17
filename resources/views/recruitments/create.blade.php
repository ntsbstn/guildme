@extends('layouts.master')

@section('content')
<div class="container">
        <h1>Create a new recruitment</h1>
        <p>In order to facilitate the search results, we ask you to enter one recruitment per class</p>
        <hr>
       @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li> {{ $error }}</li>
              @endforeach
            </ul>
        </div>
        @endif

        @foreach( $user->guilds as $guild)
          <h2> {{ $guild->name }}</h2>
        @endforeach
       {!! Form::open() !!}


       <div class="form-group">
         {!! Form::label('title','Title: ') !!}
         {!! Form::text('title', null, ['class' => 'form-control']) !!}
       </div>
       <div class="form-group">
         {!! Form::label('body','Description: ') !!}
         {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
       </div>
       <div class="form-group">
         {!! Form::label('guild_id','Guild: ') !!}
          {!! Form::select('guild_id', $guilds, array('class' => 'form-control')) !!}
       </div>
       <div class="form-group">
         {!! Form::label('number','How many to recuit: ') !!}
         {!! Form::text('number', null, ['class' => 'form-control']) !!}
       </div>
       <div class="form-group">
         {!! Form::label('realm','Realm: ') !!}
         {!! Form::select('realm',  $realms, array('class' => 'form-control')) !!}
       </div>
        <div class="form-group">
         {!! Form::label('class_id','Class: ') !!}
         {!! Form::text('class_id', null, ['class' => 'form-control']) !!}
       </div>
        <div class="form-group">
         {!! Form::label('classrole_id','Role: ') !!}
         {!! Form::text('classrole_id', null, ['class' => 'form-control']) !!}
       </div>
      
       <div class="form-group">
         {!! Form::submit('Add my character', ['class' => 'btn btn-primary form-control']) !!}
       </div>


       {!! Form::close() !!}

</div>


@endsection