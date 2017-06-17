@extends('layouts.master')

@section('content')
<div class="container">
        <h1>Add a character to your profile</h1>
        <hr>
        <button class="refresh">refresh</button>
       @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li> {{ $error }}</li>
              @endforeach
            </ul>
        </div>
        @endif

        
       <h2>My active characters</h2>
       <hr>
        @if(count($myCharacters) > 0)
          <ul class="row" id="my-character-list">
          @foreach($myCharacters as $myChar)
             
              <li class="col-xs-6 col-sm-4 col-md-2"><a href="{{ route('show-character', ['id' => $myChar['id']]) }}"><img src="https://render-eu.worldofwarcraft.com/character/{{ $myChar['thumbnail'] }}"><br>{{ $myChar['name'] }}</a></li>
              
          @endforeach
          </ul>
      @else
      <p>no character added yet</p>
      @endif

      <div id="character-list"></div>
</div>


@endsection
@section('scripts')
<script>
$("button.refresh").click(function(e) {
  e.preventDefault();
  var idajax = 4;
  $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      url: '/my/characters/refresh', // This is the url we gave in the route
      data: {name:'name', value: 'value'}, // a JSON object to send back
       headers: {'X-CSRF-Token':'{{ csrf_token() }}'},
      success: function(characters){ // What to do if we succeed
          $("#character-list").html(characters);
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
         // console.log(JSON.stringify(jqXHR));
          console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
  });
});
</script>
@endsection

