@extends('landing.layouts.main')

@section('title', 'e-Kostan - Rekomendasi Kost Murah dan Nyaman')

@section('content')

<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1 rs2-slick1">
        <div class="slick1">
            <div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('landing/images/slide-05.jpg') }});" data-thumb="{{ asset('landing/images/thumb-01.jpg') }}" data-caption="Women’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                Women Collection 2018
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                New arrivals
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('landing/images/slide-06.jpg') }});" data-thumb="{{ asset('landing/images/thumb-02.jpg') }}" data-caption="Men’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                Men New-Season
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                Jackets & Coats
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('landing/images/slide-07.jpg') }});" data-thumb="{{ asset('landing/images/thumb-03.jpg') }}" data-caption="Men’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                Men Collection 2018
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                NEW SEASON
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap-slick1-dots p-lr-10"></div>
    </div>
</section>

<!-- Product -->
<section class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Kost Overview
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                {{-- <div class="bor8 dis-flex p-l-15"> --}}
                <form class="bor8 dis-flex p-l-15" action="/cari" method="post">
                    @csrf
                    <button name="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="cari" placeholder="Search">
                </form>
                {{-- </div> --}}
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="justify-content-center wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <form class="justify-content-center wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm" action="/filter" method="POST">
                        @csrf
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Jarak
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_jarak" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled value="0">Pilih Jarak</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Fasilitas
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_fasilitas" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled value="0">Pilih Fasilitas</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Harga
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_harga" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled value="0">Pilih Harga</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Lokasi
                            </div>
                            <div class="form-group">
                                <select name="kepentingn_lokasi" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled value="0">Pilih Lokasi</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Keamanan
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_keamanan" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled value="0">Pilih Keamanan</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Akses Jalan
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_aksesjalan" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled value="0">Pilih Akses Jalan</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="justify-content-center text-center">
                                <button type="submit" class="stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row isotope-grid">

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

                        <a href="/detail-kost/{{ $data['data']->kost->id }}/#detail-kost" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
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


        </div>
    </div>
</section>
@endsection
