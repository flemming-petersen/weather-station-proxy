@extends('layouts.default')

@section('content')
<ul>
    @foreach ($stations as $station)
        <li class="w-full bg-white p-8 shadow-md my-8">
            <section class="py-4 flex justify-between align-middle">
                <h2>{{ $station->public_name }}</h2>
                <a href="/admin/{{ $station-> id }}/edit">Bearbeiten</a>
            </section>
        </li>
    @endforeach
</ul>
<a class="rounded bg-cyan-400 p-4" href="{{ route('admin.station.create') }}">Neue Station erstellen</a>
@endsection
