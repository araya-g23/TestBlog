<?php

@extends('layouts.main')

@section('content')
    <h1>Football Teams</h1>
    @foreach($teams as $team)
        <h3><a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a></h3>
    @endforeach
@endsection

