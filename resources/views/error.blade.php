@extends('layouts.app')
@section('title', 'Error')

@section('content')
    <h1>Error</h1>

    @isset($message)
        {{ $message }}
    @endisset
@endsection
