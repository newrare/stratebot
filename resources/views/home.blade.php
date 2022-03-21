@extends('layouts.app')
@section('title', 'Welcome')

@section('content')
    <div class="min-h-screen flex flex-col justify-center">
        <div class="flex flex-row justify-center m-8">
            <img src="/stratebot.png" alt="{{ env('APP_NAME') }}" />
        </div>
    </div>
@endsection
