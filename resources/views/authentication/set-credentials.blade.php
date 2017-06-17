@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Set your credentials</h1>
        <p>Since Blizzard keep your email secret when you're using the battle net button to register or login, we have to ask you additional details to make sure we are able to send you relevant information about your activity on Guild Finder.</p>
            <div class="panel panel-default">
                <div class="panel-heading">Set your credentials</div>

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

                {{ @dd($chars) }}
                    {!! Form::open(['url'=>'my/credentials']) !!}
                        <div class="form-group">
                            {!! Form::label('username','Username: ') !!}
                            {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','Email: ') !!}
                            {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password','Password: ') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation','Password Confirmation: ') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control','required' =>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Update my account', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>


                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
