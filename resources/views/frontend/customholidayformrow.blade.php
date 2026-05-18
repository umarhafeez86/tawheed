
<div id="sublegs_{{ $rowno }}" class="row m-0 p-0">
    <div class="mb-3 col-lg-3 col-6 autocomplete-container">
        <label for="DepartureFrom_{{ $rowno }}" class="custom-label">Departure From</label>
        <select class="form-control select2" name="DepartureFrom[]" id="DepartureFrom_{{ $rowno }}">
            <option value="">-- Select One--</option>
            @php
                use App\Models\Airports;
                $airports = Airports::orderBy('name', 'asc')->get();
            @endphp
            @foreach ($airports as $airport)
                <option
                    value="{{ $airport->cityName }} {{ $airport->name }} ({{ $airport->code }})-{{ $airport->countryName }}">
                    {{ $airport->cityName }} {{ str_replace($airport->cityName,"",$airport->name) }} ({{ $airport->code }})-{{ $airport->countryName }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-lg-3 col-6 autocomplete-container">
        <label for="Destination_{{ $rowno }}" class="custom-label">Destination</label>
        <select class="form-control select2" name="Destination[]" id="Destination_{{ $rowno }}">
            <option value="">-- Select One--</option>
            @php
                $airports = Airports::orderBy('name', 'asc')->get();
            @endphp
            @foreach ($airports as $airport)
                <option
                    value="{{ $airport->cityName }} {{ $airport->name }} ({{ $airport->code }})-{{ $airport->countryName }}">
                    {{ $airport->cityName }} {{ str_replace($airport->cityName,"",$airport->name) }} ({{ $airport->code }})-{{ $airport->countryName }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-lg-3 col-6">
        <label for="DepartureDate_1" class="custom-label">Date</label>
        <input type="date" class="form-control" name="DepartureDate[]" id="DepartureDate_{{ $rowno }}">
    </div>
    <div class="mt-4 mb-3 col-lg-3 col-6">
        <button type="button" class="leg-btn2" onclick="removerow('{{ $rowno }}');">
            <img src="{{ asset('frontend/assets/images/minus.svg') }}" class="img-fluid" alt=""> Remove
            leg</button>
    </div>
</div>

<script>
    $('.select2').select2();
</script>