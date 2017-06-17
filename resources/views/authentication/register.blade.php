@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                 @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $error)
                        <li> {{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                    {!! Form::open(['url'=>'register']) !!}
                        <div class="form-group">
                            {!! Form::label('username','Username: ') !!}
                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','Email: ') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password','Password: ') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Start using guild finder', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>


                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
