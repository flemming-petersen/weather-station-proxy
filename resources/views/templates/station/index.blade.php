@extends('layouts.default')

@section('content')
    <ul>
        @foreach ($stations as $station)
            <li class="w-full bg-white p-8 shadow-md">
                <section class="py-4 flex justify-between align-middle">
                    <h2>{{ $station->public_name }}</h2>
                    <small class="text-slate-500">Zuletzt aktualisiert: {{ $station->entries->last()->created_at->format('d.m.Y H:i') }}</small>
                </section>
                <section class="py-4">
                        <h3 class="mb-2">Wind (letzten 4 min.)</h3>
                        <div class="flex justify-between">
                            <div>
                                <p>Durchschnitt</p>
                                <p>{{ CalculatedWindHelper::getCurrentFlattenedAvgWindSpeed($station) }} Knoten</p>
                            </div>
                            <div>
                                <p>Minimum</p>
                                <p>{{ CalculatedWindHelper::getCurrentFlattenedMinWindSpeed($station) }} Knoten</p>
                            </div>
                            <div>
                                <p>Maximum</p>
                                <p>{{ CalculatedWindHelper::getCurrentFlattenedMaxWindSpeed($station) }} Knoten</p>
                            </div>
                        </div>
                </section>
                <section class="flex justify-between">
                    <div>
                        <h3>Temperatur</h3>
                        <p>{{ $station->entries->last()->temperature }} °C</p>
                    </div>
                    <div>
                        <h3>Luftfeuchtigkeit</h3>
                        <p>{{ $station->entries->last()->humidity }} %</p>
                    </div>
                    <div>
                        <h3>UV-Index</h3>
                        <p>{{ $station->entries->last()->uv }} %</p>
                    </div>
                </section>
            </li>
        @endforeach
    </ul>
@endsection
