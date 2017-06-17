@extends('layouts.master')

@section('content')
<div class="container">
        <h1>List of all characters</h1>
        <hr>

        <table class="table table-responsive table-hover">
           <thead>
              <tr>
                <th>Picture</th>
                <th>Character name</th>
                <th>Realm</th>
                <th>Level</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
                @foreach($characters as $character)
                <tr>
                  <td><img class="card-img-top" src="{{ url('storage/images/characters') }}/{{ $character->thumbnail }}" alt="Card image cap"></td>
                  <td><a href="{!! route('show-character', array($character->id)) !!}" class="btn btn-primary">{{ $character->name }}</a></td>
                  <td></td>
                  <td>{{ $character->level }}</td>
                  <td>{{ $character->user->username}}</td>
                  </tr>
                @endforeach
        </table>
       <div class="card-deck">
       </div>
</div>


@endsection