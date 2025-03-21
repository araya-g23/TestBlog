<?php
@extends('layouts.main')

@section('content')
    <h1>{{ $team->name }}</h1>
    <p>Stadium: {{ $team->stadium }}</p>
@endsection
