@if(count($characters) > 0)
    <h2>My 80+ characters</h2>
    <hr>
    <p>You can add those character on Guild Finder</p>
    <ul class="row" id="character-list">
    @foreach($characters as $char)
        @if($char['level'] > '80')
        <li class="col-xs-6 col-sm-4 col-md-2"><img src="https://render-eu.worldofwarcraft.com/character/{{ $char['thumbnail'] }}"><br>{{ $char['name'] }}</li>
        @endif
    @endforeach
    </ul>
@endif