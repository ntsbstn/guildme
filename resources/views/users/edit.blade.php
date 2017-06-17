@extends('layouts.master')

@section('content')
<div class="col-lg-12 text-center m-b-20">
    <h1 class="section-heading">Hey {{ $user->username }}!</h1>
    <h2 class="section-subheading text-muted">Give a refresh to your account below</h2>
</div>

<!-- Account Section -->
<section id="account-form">
    <div class="row">
        <div class="col-sm-3 text-center">
            <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
            </span>
        </div><!-- /col-sm-3-->
        <div class="panel panel-default col-sm-6 ">
            <div class="panel-heading separator">
                <div class="panel-title">Your account
                </div>
            </div>
            <div class="panel-body p-t-20 p-b-20">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
           
            {!! Form::model($user, ['route' => ['store-account', $user->id]]) !!}
            <div class="form-group form-group-default">
                {!! Form::label('username','User name: ') !!}
                {!! Form::text('username', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group form-group-default">
                    {!! Form::label('password','Current Password: ') !!}
                    {!! Form::password('password', ['class' => 'form-control','required' =>'required']) !!}
                </div>
            <div class="form-group form-group-default">
                    {!! Form::label('newPassword','New Password: ') !!}
                    {!! Form::password('newPassword', ['class' => 'form-control','required' =>'required']) !!}
                </div>
                <div class="form-group form-group-default">
                    {!! Form::label('newPassword_confirmation','New password Confirmation: ') !!}
                    {!! Form::password('newPassword_confirmation', ['class' => 'form-control','required' =>'required']) !!}
                </div>
            <div class="form-group">
                {!! Form::submit('Update my user account', ['class' => 'btn btn-primary pull-right']) !!}
            </div>

            {!! Form::close() !!}
            </div>
        </div><!-- /col-sm-6 -->
    </div><!-- /row -->
</section>

<!-- Playstyle Section -->
<section id="activity-form">
    <div class="row">
        <div class="col-sm-3 text-center">
            <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-mouse-pointer fa-stack-1x fa-inverse"></i>
            </span>
        </div><!-- /col-sm-3-->
        <div class="panel panel-default col-sm-6 ">
            <div class="panel-heading separator">
                <div class="panel-title">Your activities on Guild Finder
                </div>
            </div>
            <div class="panel-body p-t-20 p-b-20">
            {!! Form::model($user, ['route' => ['store-preferences', $user->id]]) !!}

            <div class="form-group form-group-default">
                    {!! Form::label('status','Looking for a guild: ') !!}                    
                    {!! Form::hidden('status', '0') !!}                
                    {!! Form::checkbox('status', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]) !!} 
            </div>
            
            <div class="form-group">
                {!! Form::submit('Update my user account', ['class' => 'btn btn-primary pull-right']) !!}
            </div>

            {!! Form::close() !!}
            </div>
        </div><!-- /col-sm-6 -->
    </div><!-- /row -->
</section>

<!-- Playstyle Section -->
<section id="playstyle-form">
    <div class="row">
        <div class="col-sm-3 text-center">
            <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-mouse-pointer fa-stack-1x fa-inverse"></i>
            </span>
        </div><!-- /col-sm-3-->
        <div class="panel panel-default col-sm-6 ">
            <div class="panel-heading separator">
                <div class="panel-title">Your play style
                </div>
            </div>
            <div class="panel-body p-t-20 p-b-20">

             {!! Form::model($user, ['route' => ['store-gameplay', $user->id]]) !!}
            <div class="form-group form-group-default">
                    {!! Form::label('daysPerWeek','Days per week available: ') !!}
                    <div id="noUiSlider" class="bg-master m-b-50"></div>
                    <div id="pips-positions"></div>
                    {!! Form::hidden('daysPerWeek', null, ['class' => 'form-control']) !!}                
            </div>
            <div class="row">
            <div class="col-sm-3">
                <div class="form-group form-group-default  text-center">
                    {!! Form::label('interest_fun','Fun: ') !!}
                     {!! Form::hidden('interest_fun', '0') !!}                
                    {!! Form::checkbox('interest_fun', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]) !!} 
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-group-default text-center">
                    {!! Form::label('interest_rp','RP: ') !!}
                   {!! Form::hidden('interest_rp', '0') !!}                
                    {!! Form::checkbox('interest_rp', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]) !!} 
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-group-default text-center">
                    {!! Form::label('interest_pvp','PVP: ') !!}
                    {!! Form::hidden('interest_pvp', '0') !!} 
                    {!! Form::checkbox('interest_pvp', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]) !!} 
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-group-default text-center">
                    {!! Form::label('interest_pve','PVE High level: ') !!}
                    {!! Form::hidden('interest_pve', '0') !!} 
                    {!! Form::checkbox('interest_pve', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]) !!} 
                </div>
            </div>
            </div>
            <div class="form-group form-group-default">
                {!! Form::label('about','Describe the type of player you are: ') !!}
                {!! Form::textarea('about', null, ['class' => 'form-control', 'size' => '30x5']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update my user account', ['class' => 'btn btn-primary pull-right']) !!}
            </div>

            {!! Form::close() !!}
            </div>
        </div><!-- /col-sm-6 -->
    </div><!-- /row -->
</section>

@endsection