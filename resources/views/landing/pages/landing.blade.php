@extends('landing.layouts.main')

@section('title', 'e-Kostan - Rekomendasi Kost Murah dan Nyaman')

@section('content')

<!-- Product -->
<section id="product" class="bg0 p-t-23 p-b-130">
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
                <form class="bor8 dis-flex p-l-15" action="" method="get">
                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="cari" placeholder="Search">
                    <button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                {{-- </div> --}}
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="justify-content-center wrap-filter flex-w bg0 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <form class="justify-content-center wrap-filter flex-w bg0 w-full p-lr-40 p-t-27 p-lr-15-sm" action="" method="get">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Jarak
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_jarak" class="form-control" id="exampleFormControlSelect1">
                                    <option selected value="0">Pilih Jarak</option>
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
                                    <option selected value="0">Pilih Fasilitas</option>
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
                                    <option selected value="0">Pilih Harga</option>
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
                                <select name="kepentingan_lokasi" class="form-control" id="exampleFormControlSelect1">
                                    <option selected value="0">Pilih Lokasi</option>
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
                                    <option selected="0">Pilih Keamanan</option>
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
                                    <option selected value="0">Pilih Akses Jalan</option>
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
                                <button class="stext-103 cl2 size-102 bg0 bor4 hov-btn1 p-lr-15 trans-04">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="test">
            <div class="row">
                @include('landing.data.landing')
            </div>
        </div>
        <div id="trigger"></div>
    </div>
</section>
@endsection

@section('script')

<script>
    var page = 1;

    @if($cari == "filter")
    var ENDPOINT = '/?kepentingan_jarak=' + encodeURIComponent("{{ $kepentingan_jarak }}") +
        '&kepentingan_fasilitas=' + encodeURIComponent("{{ $kepentingan_fasilitas }}") +
        '&kepentingan_harga=' + encodeURIComponent("{{ $kepentingan_harga }}") +
        '&kepentingan_lokasi=' + encodeURIComponent("{{ $kepentingan_lokasi }}") +
        '&kepentingan_keamanan=' + encodeURIComponent("{{ $kepentingan_keamanan }}") +
        '&kepentingan_aksesjalan=' + encodeURIComponent("{{ $kepentingan_aksesjalan }}");

    @else
    var ENDPOINT = '/?cari=' + encodeURIComponent("{{ $cari }}")
    @endif

    // jika scroll sudah mencapai bagian id trigger maka akan memanggil fungsi loadMoreData
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $('#trigger').offset().top) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        $.ajax({
                url: ENDPOINT + '&page=' + page // Perhatikan penggunaan "&" sebagai pemisah parameter.
                , type: "get"
                , beforeSend: function() {
                    $('.ajax-load').show();
                }
            })
            .done(function(data) {
                if (data.html == "") {
                    alert('data habis');
                    return;
                }
                $('.ajax-load').hide();
                $("#test").append('<div class="row">' + data.html + '</div>');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }

</script>

@if(Session::get('logout'))
<script>
    swal({
        title: "Berhasil Logout"
        , text: "Anda telah berhasil logout"
        , icon: "success"
        , button: "OK"
    , });

</script>
@endif

@if(Session::get('login'))
<script>
    swal({
        title: "Berhasil Login"
        , text: "Anda telah berhasil login"
        , icon: "success"
        , button: "OK"
    , });

</script>
@endif


@endsection
