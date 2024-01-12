@if($alternatifterbaik == null)

@if($kost->count() == 0)

<div class="tab01">
    <div class="text-center">
        <p>Data ditidak ditemukan</p>
    </div>

</div>

@else

@foreach ($kost as $data )
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="{{ asset('landing/images/product-01.jpg') }}" alt="IMG-PRODUCT">

            <a href="/detail-kost/{{ $data->id }}/#detail-kost" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                Detail
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="/detail-kost/{{ $data->id }}/#detail-kost" target="blank" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{ $data->name }}
                </a>

                <span class="stext-105 cl3">
                    Rp. {{ number_format($data->price) }}
                </span>
            </div>

            @if(Auth::check())


            <div class="block2-txt-child2 flex-r p-t-3">
                <a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                    <img class="icon-heart1 dis-block trans-04" src="{{ asset('landing/images/icons/icon-heart-01.png') }}" alt="ICON">
                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('landing/images/icons/icon-heart-02.png') }}" alt="ICON">
                </a>
            </div>

            @else

            @endif

        </div>
    </div>
</div>

@endforeach

@endif



@else

@foreach ($alternatifterbaik as $data )

<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="{{ asset('landing/images/product-01.jpg') }}" alt="IMG-PRODUCT">

            <a href="/detail-kost/{{ $data['data']->kost->id }}/#detail-kost" target="blank" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                Detail
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="/detail-kost/{{ $data['data']->kost->id }}/#detail-kost" target="blank" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{ $data['data']->kost->name }}
                </a>

                <span class="stext-105 cl3">
                    Rp. {{ number_format($data['data']->kost->price) }}
                </span>
            </div>

            @if(Auth::check())


            <div class="block2-txt-child2 flex-r p-t-3">
                <a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                    <img class="icon-heart1 dis-block trans-04" src="{{ asset('landing/images/icons/icon-heart-01.png') }}" alt="ICON">
                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('landing/images/icons/icon-heart-02.png') }}" alt="ICON">
                </a>
            </div>

            @else

            @endif

        </div>
    </div>
</div>

@endforeach


@endif
