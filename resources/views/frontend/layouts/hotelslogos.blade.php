@php
    use App\Models\Hotelslogos;
    $hotelslogos = Hotelslogos::where('hotelslogos_status', 1)->orderBy('hotelslogos_sort', 'asc')->get();
@endphp
@if ($hotelslogos->count() > 0)
    <div class="container-fluid scroll-container gap-5 custome-margin-top custome-margin-bottom">
        <h2>Top Rated Hotels we Choose for You</h2>
        <div class="scroll-content mt-3 mt-lg-5">
            <!-- Original logos -->
            @foreach ($hotelslogos as $hotelslogo)
                <img src="{{ asset('uploads/hotelslogos/' . $hotelslogo->hotelslogos_image) }}" class="img-fluid" alt="">
            @endforeach
            @foreach ($hotelslogos as $hotelslogo)
                <img src="{{ asset('uploads/hotelslogos/' . $hotelslogo->hotelslogos_image) }}" class="img-fluid" alt="">
            @endforeach
        </div>
    </div>
@endif
