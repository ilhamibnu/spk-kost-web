@if($kost->count() == 0)

{{-- <div class="tab01">
    <div class="text-center">
        <p>Anda tidak memiliki whitelist</p>
    </div>

</div> --}}

@else

@foreach ($kost as $data )
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">

            <img height="500px" width="500px" src=" {{ asset('fotokost/' . $data->kost->foto) }}" alt="IMG-PRODUCT">

            <a href="/detail-kost/{{ $data->kost->id }}/#detail-kost" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                Detail
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="/detail-kost/{{ $data->kost->id }}/#detail-kost" class="stext-105 cl3 hov-cl1"><i class="zmdi zmdi-home"></i>
                    {{ $data->kost->name }}
                </a>

                <span class="stext-105 cl3"><i class="zmdi zmdi-label"></i>
                    Rp. {{ number_format($data->kost->price) }}
                </span>
                <span class="stext-105 cl3"><i class="zmdi zmdi-pin"></i>
                    {{ $data->kost->alamat }}
                </span>
                <span class="stext-105 cl3"><i class="zmdi zmdi-bookmark"></i>
                    {{ $data->kost->fasilitas->name }}
                </span>

            </div>
        </div>
    </div>
</div>

@endforeach
@endif
