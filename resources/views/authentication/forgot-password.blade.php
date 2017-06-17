@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Forgot Password</div>

                <div class="panel-body">
                    {!! Form::open(['url'=>'forgot-password']) !!}
                        <div class="form-group">
                            {!! Form::label('email','Email: ') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'required' =>'required']) !!}
                        </div>
                        
                        
                        <div class="form-group">
                            {!! Form::submit('Send code', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>


                        {!! Form::close() !!}
                </div>
            </div>
               
        </div>
    </div>
</div>
@endsection
