@extends('layouts.app')
@section('title', 'Test')

@section('content')
    <livewire:input label="Login" icon="fas-user" error="User not found!" />
    <livewire:input type="password" />
    <livewire:input label="Test" error="Nope" />
    <livewire:input label="Truc" />

    <livewire:alert message='String' />
    <livewire:alert :message='$plop' />
    <livewire:alert type="danger" message='Danger' />
    <livewire:alert type="success" message='OK' />
    <livewire:alert type="success" message='Menu' icon='fas-square' />
    <livewire:alert type="warn" message='oups' />

    <livewire:attack />
@endsection
