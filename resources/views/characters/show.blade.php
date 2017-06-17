@extends('layouts.master')

@section('content')

<div class="social-wrapper">
  <div class="social " data-pages="social">
    <div class="jumbotron" data-pages="parallax" data-social="cover">
    <div class="cover-photo">
      <img alt="Cover photo" src="{{ url('storage/images/characters') }}/{{ $character->main }}"/>
    </div>
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
      <div class="inner">
      <div class="pull-bottom bottom-left m-b-40">
        <h1 class="text-white no-margin">{{ $character->name }},</h1>
        <h5 class="text-white no-margin">a {{ $character->user->username}}'s character</h5>
      </div>
  </div>
</div>
</div>
<div id="charInfo">
  <div class="container">
    <div class="row text-center">
      <div class="col-sm-3">{{ $region->name }} {{ $character->realm }}</div>
{{ @dd($character)}}
      <div class="col-sm-3">{{ $class->name }}</div>
      <div class="col-sm-3">{{ $race->name }}</div>
      <div class="col-sm-3">{{ $character->level }}</div>
    </div>
  </div>
</div>
</div>
<div class="container">
<table class="table table-responsive">
   <thead>
        <tr>
            <th>Emerald Nightmare</th>
            <th>Trial of Valor</th>
            <th>The Nighthold</th>
            <th>The tomb of Sargeras</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        LFR {{ $character->getKillStats('8026', 'lfrKills') }}
        NM {{ $character->getKillStats('8026', 'normalKills') }}
        HM {{ $character->getKillStats('8026', 'heroicKills') }}
        MM {{ $character->getKillStats('8026', 'mythicKills') }}
        </td>
        <td>
        LFR {{ $character->getKillStats('8440', 'lfrKills') }}
        NM {{ $character->getKillStats('8440', 'normalKills') }}
        HM {{ $character->getKillStats('8440', 'heroicKills') }}
        MM {{ $character->getKillStats('8440', 'mythicKills') }}
        </td>

        <td>
        LFR {{ $character->getKillStats('8025', 'lfrKills') }}
        NM {{ $character->getKillStats('8025', 'normalKills') }}
        HM {{ $character->getKillStats('8025', 'heroicKills') }}
        MM {{ $character->getKillStats('8025', 'mythicKills') }}
        </td>
        <td>
        LFR {{ $character->getKillStats('8026', 'lfrKills') }}
        NM {{ $character->getKillStats('8026', 'normalKills') }}
        HM {{ $character->getKillStats('8026', 'heroicKills') }}
        MM {{ $character->getKillStats('8026', 'mythicKills') }}
        </td>
      </tr>
    </tbody>

</table>

<table class="table table-hover dataTable no-footer">
  <thead>
    <tr role="row">
      <td>Raid</td>
      <td>Boss</td>
      <td>LFR</td>
      <td>Normal</td>
      <td>Heroic</td>
      <td>Mythic</td>
    </tr>
  </thead>
  <tbody>
    @foreach($kills as $kill)
    <tr role="row">
      <td>Raid</td>
      <td>{{ $character->getBoss($kill->boss_id)->name }}</td>
      <td>{{ $kill->lfrKills }}</td>
      <td>{{ $kill->normalKills }}</td>
      <td>{{ $kill->heroicKills }}</td>
      <td>{{ $kill->mythicKills }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>



@endsection