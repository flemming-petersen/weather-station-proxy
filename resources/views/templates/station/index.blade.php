@extends('layouts.default')

@section('content')
    <ul>
        @foreach ($stations as $station)
            <li class="w-full bg-white p-8 shadow-md my-8">
                <section class="py-4 flex justify-between align-middle">
                    <h2>{{ $station->public_name }}</h2>
                    @if($station->entries->last())
                        <small class="text-slate-500">Zuletzt aktualisiert: {{ $station->entries->last()->created_at->format('d.m.Y H:i') }}</small>
                    @endif
                </section>
                @if ( $station->entries->last() )
                    @include('partials.station.current-values')
                @endif
            </li>
        @endforeach
    </ul>
@endsection
