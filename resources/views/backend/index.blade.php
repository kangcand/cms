@extends('layouts.backend')
@section('content')
Hai <b>{{ Auth::user()->name }}</b>
@endsection