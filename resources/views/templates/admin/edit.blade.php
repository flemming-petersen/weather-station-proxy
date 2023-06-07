@extends('layouts.default')

@section('content')

<x-card>
    <h1 class="text-3xl mb-16">{{ $station->public_name }}</h1>
    <form action="/admin/{{ $station->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $station->id }}">
        <div class="flex flex-col">
            <x-form.label name="public_name">Öffentlicher Name</x-form.label>
            <x-form.text name="public_name" value="{{ $station->public_name }}" />
        </div>
        <div class="flex flex-col">
            <x-form.label name="alias">Alias (Name, der in der Station hinterlegt ist.)</x-form.label>
            <x-form.text name="alias" value="{{ $station->alias }}" />
        </div>
        <div class="flex flex-col">
            <x-form.label name="secret">Secret (Secret, der in der Station hinterlegt ist.)</x-form.label>
            <x-form.text name="secret" value="{{ $station->secret }}" />
        </div>
        <div class="flex flex-col">
            <x-form.label name="latitude">Latitude</x-form.label>
            <x-form.text name="latitude" value="{{ $station->latitude }}" />
        </div>
        <div class="flex flex-col">
            <x-form.label name="longitude">longitude</x-form.label>
            <x-form.text name="longitude" value="{{ $station->longitude }}" />
        </div>
        <div class="flex flex-col">
            <x-form.label name="description">Beschreibung</x-form.label>
            <x-form.text name="description" value="{{ $station->description }}" />
        </div>
        <div class="flex flex-col">
            <x-form.label name="windguru_uid">Windguru Uid</x-form.label>
            <x-form.text name="windguru_uid" value="{{ $station->windguru_uid }}" />
        </div>
        <div class="flex flex-col">
            <x-form.label name="windguru_salt">Windguru Salt</x-form.label>
            <x-form.text name="windguru_salt" value="{{ $station->windguru_salt }}" />
        </div>
        <div class="flex flex-col">
            <x-form.label name="windguru_password">Windguru Password</x-form.label>
            <x-form.text name="windguru_password" value="{{ $station->windguru_password }}" />
        </div>
        <div class="flex flex-col">
            <x-form.label name="windguru_widget">Windguru Widget</x-form.label>
            <x-form.textarea name="windguru_widget" value="{{ $station->windguru_widget }}" />
        </div>
        <button class="rounded bg-cyan-400 p-4" type="submit">Speichern</button>
    </form>
</x-card>

@endsection
