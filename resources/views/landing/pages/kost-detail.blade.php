@extends('landing.layouts.main')

@section('title', $kost->name . ' - e-Kostan')

@section('content')

<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $kost->name }}
        </span>
    </div>
</div>


<!-- Product Detail -->
<section id="detail-kost" class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="{{ asset('fotokost/' . $kost->foto) }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('fotokost/' . $kost->foto) }}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('fotokost/' . $kost->foto) }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            @php
                            $detail = \App\Models\DetailKostFoto::where('id_kost', $kost->id)->get();
                            @endphp

                            @foreach($detail as $d)
                            <div class="item-slick3" data-thumb="{{ asset('images/detailkost/' . $d->foto) }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('images/detailkost/' . $d->foto) }}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('images/detailkost/' . $d->foto) }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{ $kost->name }}
                    </h4>

                    <span class="mtext-106 cl2">
                        Rp. {{ number_format($kost->price) }}
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        Jika anda tertarik dengan kost ini, silahkan hubungi nomor dibawah ini
                    </p>

                    <div class="row">

                        <a class="btn stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-2 mt-1" href="https://wa.me/{{ $kost->no_pemilik }}" target="_blank"><i class="zmdi zmdi-whatsapp mt-2"></i></a>

                        @if(Auth::check() != null)

                        @php
                        $cek = \App\Models\SimpanKost::where('id_user', Auth::user()->id)->where('id_kost', $kost->id)->first();
                        @endphp

                        @if($cek == null)

                        <form action="/simpanwhitelist" method="post">
                            @csrf
                            <input hidden name="id_kost" value="{{ $kost->id }}">
                            <input hidden name="id_user" value="{{ Auth::user()->id }}">
                            <button class="stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-2 mt-1">
                                <i class="zmdi zmdi-favorite"></i>
                            </button>
                        </form>

                        @else
                        <form action="/deletewhitelist" method="post">
                            @csrf
                            <input hidden name="id_kost" value="{{ $kost->id }}">
                            <input hidden name="id_user" value="{{ Auth::user()->id }}">
                            <button class="stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-2 mt-1">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </form>
                        @endif



                        @else


                        @endif



                    </div>

                </div>
                <div class="bor10 m-t-50 p-t-43 p-b-40">
                    <!-- Tab01 -->
                    <div class="tab01">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item p-b-5">
                                <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                            </li>

                            <li class="nav-item p-b-5">
                                <a class="nav-link" data-toggle="tab" href="#information" role="tab">Information</a>
                            </li>
                            <li class="nav-item p-b-5">
                                <a class="nav-link" data-toggle="tab" href="#maps" role="tab">Maps</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-t-43">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <div class="how-pos2 p-lr-15-md">
                                    <p class="stext-102 cl6">
                                        {{ $kost->deskripsi }}
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="maps" role="tabpanel">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <ul class="p-lr-28 p-lr-15-sm">
                                        <li class="flex-w flex-t p-b-7">
                                            {!! nl2br($kost->maps) !!}
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <!-- - -->
                            <div class="tab-pane fade" id="information" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                        <ul class="p-lr-28 p-lr-15-sm">
                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Name
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    {{ $kost->name }}
                                                </span>
                                            </li>

                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Harga
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    Rp. {{ number_format($kost->price) }}
                                                </span>
                                            </li>

                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Alamat
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    {{ $kost->alamat }}
                                                </span>
                                            </li>

                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Jarak
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    {{ $kost->jarak->name }}
                                                </span>
                                            </li>

                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Fasilitas
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    {{ $kost->fasilitas->name }}
                                                </span>
                                            </li>

                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Harga
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    {{ $kost->harga->name }}
                                                </span>
                                            </li>

                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Lokasi
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    {{ $kost->lokasi->name }}
                                                </span>
                                            </li>

                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Keamanan
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    {{ $kost->keamanan->name }}
                                                </span>
                                            </li>

                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Akses Jalan
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    {{ $kost->aksesjalan->name }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@if(Session::get('simpanwhitelist'))
<script>
    swal({
        title: "Berhasil"
        , text: "Berhasil menyimpan kost ke daftar favorit"
        , icon: "success"
        , button: "OK"
    , });

</script>
@endif

@if(Session::get('deletewhitelist'))
<script>
    swal({
        title: "Berhasil"
        , text: "Berhasil menghapus kost dari daftar favorit"
        , icon: "success"
        , button: "OK"
    , });

</script>
@endif

@endsection
