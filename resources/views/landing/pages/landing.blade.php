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
                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" @if(Session::get('cari') !=null) value="{{ Session::get('cari') }}" @else value="" @endif name="cari" placeholder="Search">
                    <button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                {{-- </div> --}}
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="alert alert-warning alert-dismissible fade show mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <div class="text-center">
                        <span>Apabila terdapat kriteria yang tidak dipilih, filter tidak akan proses oleh system.</span>
                    </div>


                </div>
                <div class="justify-content-center wrap-filter flex-w bg0 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <form class="justify-content-center wrap-filter flex-w bg0 w-full p-lr-40 p-t-27 p-lr-15-sm" action="" method="get">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Jarak
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_jarak" class="form-control" id="exampleFormControlSelect1">
                                    @if(Session::get('kepentingan_jarak') !=null)
                                    @if(Session::get('kepentingan_jarak') == 1)
                                    <option selected value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_jarak') == 2)
                                    <option value="1">Tidak Penting</option>
                                    <option selected value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_jarak') == 3)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option selected value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_jarak') == 4)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option selected value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_jarak') == 5)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option selected value="5">Sangat Penting</option>
                                    @endif
                                    @else
                                    <option selected value="0">Pilih Jarak</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>

                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Fasilitas
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_fasilitas" class="form-control" id="exampleFormControlSelect1">

                                    @if(Session::get('kepentingan_fasilitas') !=null)
                                    @if(Session::get('kepentingan_fasilitas') == 1)
                                    <option selected value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_fasilitas') == 2)
                                    <option value="1">Tidak Penting</option>
                                    <option selected value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_fasilitas') == 3)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option selected value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_fasilitas') == 4)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option selected value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_fasilitas') == 5)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option selected value="5">Sangat Penting</option>
                                    @endif
                                    @else
                                    <option selected value="0">Pilih Fasilitas</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Harga
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_harga" class="form-control" id="exampleFormControlSelect1">

                                    @if(Session::get('kepentingan_harga') !=null)
                                    @if(Session::get('kepentingan_harga') == 1)
                                    <option selected value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_harga') == 2)
                                    <option value="1">Tidak Penting</option>
                                    <option selected value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_harga') == 3)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option selected value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_harga') == 4)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option selected value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_harga') == 5)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option selected value="5">Sangat Penting</option>
                                    @endif
                                    @else
                                    <option selected value="0">Pilih Harga</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Lokasi
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_lokasi" class="form-control" id="exampleFormControlSelect1">

                                    @if(Session::get('kepentingan_lokasi') !=null)
                                    @if(Session::get('kepentingan_lokasi') == 1)
                                    <option selected value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_lokasi') == 2)
                                    <option value="1">Tidak Penting</option>
                                    <option selected value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_lokasi') == 3)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option selected value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_lokasi') == 4)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option selected value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_lokasi') == 5)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option selected value="5">Sangat Penting</option>
                                    @endif
                                    @else
                                    <option selected value="0">Pilih Lokasi</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Keamanan
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_keamanan" class="form-control" id="exampleFormControlSelect1">

                                    @if(Session::get('kepentingan_keamanan') !=null)
                                    @if(Session::get('kepentingan_keamanan') == 1)
                                    <option selected value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_keamanan') == 2)
                                    <option value="1">Tidak Penting</option>
                                    <option selected value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_keamanan') == 3)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option selected value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_keamanan') == 4)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option selected value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_keamanan') == 5)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option selected value="5">Sangat Penting</option>
                                    @endif
                                    @else
                                    <option selected value="0">Pilih Keamanan</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Akses Jalan
                            </div>
                            <div class="form-group">
                                <select name="kepentingan_aksesjalan" class="form-control" id="exampleFormControlSelect1">

                                    @if(Session::get('kepentingan_aksesjalan') !=null)
                                    @if(Session::get('kepentingan_aksesjalan') == 1)
                                    <option selected value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_aksesjalan') == 2)
                                    <option value="1">Tidak Penting</option>
                                    <option selected value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_aksesjalan') == 3)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option selected value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_aksesjalan') == 4)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option selected value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @elseif(Session::get('kepentingan_aksesjalan') == 5)
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option selected value="5">Sangat Penting</option>
                                    @endif
                                    @else
                                    <option selected value="0">Pilih Akses Jalan</option>
                                    <option value="1">Tidak Penting</option>
                                    <option value="2">Kurang Penting</option>
                                    <option value="3">Cukup Penting</option>
                                    <option value="4">Penting</option>
                                    <option value="5">Sangat Penting</option>
                                    @endif
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
        @if($alternatifterbaik == null)

        @else

        <div class="row justify-content-center alignment-content-center mb-4">
            <div class="alert alert-success alert-dismissible fade show mt-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p>Berdasarkan kriteria yang Anda inputkan, sistem telah melakukan penghitungan dan menemukan rekomendasi kost terbaik untuk Anda:</p>
                <strong>Nama Kost : {{ $alternatifterbaik[0]['data']->kost->name }}</strong>
                <br>
                <strong>Alamat : {{ $alternatifterbaik[0]['data']->kost->alamat }}</strong>
                <br>
                <strong>Deskripsi : {{ $alternatifterbaik[0]['data']->kost->deskripsi }}</strong>
                <br>
                <strong>Harga : Rp. {{ number_format($alternatifterbaik[0]['data']->kost->price) }}</strong>
                <br>
                <strong>Jarak : {{ $alternatifterbaik[0]['data']->kost->jarak->name }}</strong>
                <br>
                <strong>Fasilitas : {{ $alternatifterbaik[0]['data']->kost->fasilitas->name }}</strong>
                <br>
                <strong>Lokasi : {{ $alternatifterbaik[0]['data']->kost->lokasi->name }}</strong>
                <br>
                <strong>Keamanan : {{ $alternatifterbaik[0]['data']->kost->keamanan->name }}</strong>
                <br>
                <strong>Akses Jalan : {{ $alternatifterbaik[0]['data']->kost->aksesjalan->name }}</strong>
                <br>
                <strong>Maps :</strong>
                {{-- // maps --}}
                <div class="row justify-content-center alignment-content-center">
                    <div id="map">
                        {!! nl2br($alternatifterbaik[0]['data']->kost->maps) !!}
                    </div>

                </div>
            </div>

        </div>

        @endif

        <div id="test">
            <div class="row">
                @include('landing.data.landing')
            </div>
        </div>
        <div class="ajax-load text-center" style="display:none">
            <p><img width="70px" height="70px" src="{{ asset('landing/images/icons/loading-2.gif') }}"></p>
        </div>
        <div class="justify-content-center text-center">
            <button id="loadmore" class="stext-103 cl2 size-102 bg0 bor4 hov-btn1 p-lr-15 trans-04">Load More</button>
        </div>
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

    // jika tombol loadmore diklik
    $("#loadmore").click(function() {
        page++;
        loadMoreData(page);
    });

    function loadMoreData(page) {
        $.ajax({
                url: ENDPOINT + '&page=' + page // Perhatikan penggunaan "&" sebagai pemisah parameter.
                , type: "get"
                , beforeSend: function() {
                    $('.ajax-load').show();
                    $('#loadmore').hide();
                }
            })
            .done(function(data) {
                if (data.html == "") {
                    $('#loadmore').hide();
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $('#loadmore').show();
                $("#test").append('<div class="row">' + data.html + '</div>');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                // alert('server not responding...');
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
