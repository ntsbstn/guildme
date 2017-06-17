@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset password</div>

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
                    {!! Form::open() !!}
                        <div class="form-group">
                            {!! Form::label('password','Password: ') !!}
                            {!! Form::password('password', ['class' => 'form-control','required' =>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation','Password Confirmation: ') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control','required' =>'required']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::submit('Update password', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>


                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
