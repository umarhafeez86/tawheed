<label class="mb-2">The Ledder you work for <span class="text-danger">*</span></label>
<select name="serviceslists_ids" class="form-select form-control" style="height: 35px;">
    <option>Select the step you are working for</option>
    @php
    use App\Models\Services;
    $sub_services = Services::where('services_parent',$services_parent)->orderBy('created_at','desc')->get();
    @endphp
    @foreach  ($sub_services as $sub_service)
    <option value="{{ $sub_service->services_id }}">{{ $sub_service->services_name }}</option>
    @endforeach
</select>