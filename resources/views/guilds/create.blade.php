@extends('layouts.master')

@section('content')
<div class="container">
        <h1>Add a guild to your profile</h1>
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
       {!! Form::open() !!}
       <div class="form-group">
         {!! Form::label('name','Name: ') !!}
         {!! Form::text('name', null, ['class' => 'form-control']) !!}
       </div>
      <div class="form-group">
         {!! Form::label('realm','Realm: ') !!}
         {!! Form::select('realm',  $realms, array('class' => 'form-control')) !!}
       </div>
       <div class="form-group">
         {!! Form::submit('Add a guild', ['class' => 'btn btn-primary form-control']) !!}
       </div>


       {!! Form::close() !!}

</div>


@endsection