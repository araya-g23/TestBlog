<?php
@extends('layouts.main')

@section('content')
    <h1>Upcoming Matches</h1>
    @foreach($matches as $match)
        <h3>{{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }}</h3>
        <p>Date: {{ $match->date }}</p>
        <p>Result: {{ $match->result ?? 'TBD' }}</p>
    @endforeach
@endsection
