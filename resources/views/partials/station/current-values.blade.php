<section class="py-4">
    <h3 class="mb-2">Wind (letzten min.)</h3>
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
        <p>{{ $station->entries->last()->uv }}</p>
    </div>
</section>
