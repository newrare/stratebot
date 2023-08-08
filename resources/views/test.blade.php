@extends('layouts.app')
@section('title', 'Test')

@section('content')
    {{ __('app.name') }}

    <x-input name="Input Component" color="yellow" type="password" />

    <x-textarea name="description" :label="__('app.description')" color="yellow" />

    <livewire:checkbox name="checkBoss" :message="__('app.boss')" />

    <x-button color="green" message="Enregistrer" icon="fas-user" />

    <x-input name="login"    label="Plop" icon="fas-user"   />
    <x-input name="pass"     type="password"                />
    <x-input name="test"     label="Test"                   />

    <x-alert type="danger"  message='Danger'                    />
    <x-alert type="warn"    message='OK'                        />
    <x-alert type="success" message='Menu' icon='fas-square'    />
    <x-alert type="nop"     message='oups'                      />

    <livewire:attack />
@endsection
