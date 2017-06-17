@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    {!! Form::open(['url'=>'login']) !!}
                        <div class="form-group">
                            {!! Form::label('email','Email: ') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'required' =>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password','Password: ') !!}
                            {!! Form::password('password', ['class' => 'form-control','required' =>'required']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::submit('Login to guild finder', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>


                        {!! Form::close() !!}
                </div>
                <a href="login/battlenet"><img src="images/oauth/google.png" alt="" width="150"></a>

            </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <a href="{{ route('forget-password') }}">Forgot password</a>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
