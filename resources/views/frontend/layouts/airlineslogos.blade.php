@php
    use App\Models\Airlineslogos;
    $airlineslogos = Airlineslogos::where('airlineslogos_status', 1)->orderBy('airlineslogos_sort', 'asc')->get();
@endphp
@if ($airlineslogos->count() > 0)
    <div class="container-fluid scroll-container gap-5 custome-margin-top custome-margin-bottom">
        <h2>Airlines</h2>
        <div class="scroll-content mt-3 mt-lg-5">
            <!-- Original logos -->
            @foreach ($airlineslogos as $airlineslogo)
                <img src="{{ asset('uploads/airlineslogos/' . $airlineslogo->airlineslogos_image) }}" class="img-fluid" alt="">
            @endforeach
            @foreach ($airlineslogos as $airlineslogo)
                <img src="{{ asset('uploads/airlineslogos/' . $airlineslogo->airlineslogos_image) }}" class="img-fluid" alt="">
            @endforeach
        </div>
    </div>
@endif
