<label class="mb-2">The province you work in <span class="text-danger">*</span></label>
<select name="state_id" class="form-select form-control @error("state_id") is-invalid @enderror">
    <option value="">Select the province you work in</option>
    @php
    use App\Models\Zones;
    $country_zones = Zones::where('country_id',$country_id)->orderBy('created_at','desc')->get();
    @endphp
    @foreach  ($country_zones as $country_zone)
    <option value="{{ $country_zone->zones_id }}" {{ old('state_id') == $country_zone->zones_id ? 'selected' : '' }}>{{ $country_zone->name }}</option>
    @endforeach
</select>
@error("state_id")
<p class="invalid-feedback">{{ $message }}</p>
@enderror