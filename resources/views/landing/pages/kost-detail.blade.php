@extends('landing.layouts.main')

@section('title', $kost->name . ' - e-Kostan')

@section('content')

<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        {{-- <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $kost->name }}
        </span> --}}
        <a class="btn stext-101 cl0 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-2 mt-1" href="{{ url()->previous() }}"><i class="zmdi zmdi-arrow-left"></i></a>
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

                        <div id="whitelist">

                            <input id="id_kost" hidden name="id_kost" value="{{ $kost->id }}">
                            <input id="id_user" hidden name="id_user" value="@if(Auth::check()){{ Auth::user()->id }}@else{{ 'notlogin' }}@endif">

                            <button hidden id="btn_simpan" class="stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-2 mt-1">
                                <i class="zmdi zmdi-favorite"></i>
                            </button>

                            <button hidden id="btn_hapus" class="stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-2 mt-1">
                                <i class="zmdi zmdi-delete"></i>
                            </button>

                        </div>

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
<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
    <span class="stext-107 cl6 p-lr-25">

    </span>

    <span class="stext-107 cl6 p-lr-25">

    </span>
</div>
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Orang Lain Juga Menyukai Ini
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach ($kostfavorite as $data)
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset('fotokost/' . $data->kost->foto) }}" alt="IMG-PRODUCT">

                            <a href="/detail-kost/{{ $data->kost->id }}/#detail-kost" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="/detail-kost/{{ $data->id }}/#detail-kost" class="stext-105 cl3 hov-cl1"><i class="zmdi zmdi-home"></i>
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

<script>
    var cekwhitelist = "{{ $whitelist }}";

    if (cekwhitelist != 'notlogin') {

        if (cekwhitelist == 1) {
            $('#btn_hapus').removeAttr('hidden');
        } else {
            $('#btn_simpan').removeAttr('hidden');
        }

    } else {


    }

    $(document).ready(function() {
        $('#btn_simpan').click(function() {
            var id_kost = $('#id_kost').val();
            var id_user = $('#id_user').val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/simpanwhitelist"
                , type: "POST"
                , data: {
                    _token: csrf
                    , id_kost: id_kost
                    , id_user: id_user
                }
                , success: function(data) {
                    swal({
                        title: "Berhasil"
                        , text: "Berhasil menyimpan kost ke daftar favorit"
                        , icon: "success"
                        , button: "OK"
                    , });
                    $('#btn_simpan').attr('hidden', 'hidden');
                    $('#btn_hapus').removeAttr('hidden');
                }
                , error: function(data) {
                    console.log(data);
                }
            });
        });

        $('#btn_hapus').click(function() {
            var id_kost = $('#id_kost').val();
            var id_user = $('#id_user').val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/deletewhitelist"
                , type: "POST"
                , data: {
                    _token: csrf
                    , id_kost: id_kost
                    , id_user: id_user
                }
                , success: function(data) {
                    swal({
                        title: "Berhasil"
                        , text: "Berhasil menghapus kost dari daftar favorit"
                        , icon: "success"
                        , button: "OK"
                    , });
                    $('#btn_hapus').attr('hidden', 'hidden');
                    $('#btn_simpan').removeAttr('hidden');
                }
                , error: function(data) {
                    console.log(data);
                }
            });
        });
    });

</script>

@endsection
