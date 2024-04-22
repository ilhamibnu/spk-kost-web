@extends('admin.layouts.main')

@section('title', 'Simulasi Rekomendasi')


@section('content')
<div class="card">
    <form action="/simulasi-rekomendasi" method="post">
        @csrf
        <div class="card-body">
            <h4 class="card-title">Pilih Filter</h4>
            <div class="form-body">
                <div class="form-group">

                    <div class="row align-items-center text-center justify-content-center m-2">

                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Jarak</label>
                            <select name="kepentingan_jarak" class="form-control" id="exampleFormControlSelect1" required>
                                <option selected disabled value="">Pilih Jarak</option>
                                <option value="1">Tidak Penting</option>
                                <option value="2">Kurang Penting</option>
                                <option value="3">Cukup Penting</option>
                                <option value="4">Penting</option>
                                <option value="5">Sangat Penting</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Fasilitas</label>
                            <select name="kepentingan_fasilitas" class="form-control" id="exampleFormControlSelect1" required>
                                <option selected disabled value="">Pilih Fasilitas</option>
                                <option value="1">Tidak Penting</option>
                                <option value="2">Kurang Penting</option>
                                <option value="3">Cukup Penting</option>
                                <option value="4">Penting</option>
                                <option value="5">Sangat Penting</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Harga</label>
                            <select name="kepentingan_harga" class="form-control" id="exampleFormControlSelect1" required>
                                <option selected disabled value="">Pilih Harga</option>
                                <option value="1">Tidak Penting</option>
                                <option value="2">Kurang Penting</option>
                                <option value="3">Cukup Penting</option>
                                <option value="4">Penting</option>
                                <option value="5">Sangat Penting</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Lokasi</label>
                            <select name="kepentingan_lokasi" class="form-control" id="exampleFormControlSelect1" required>
                                <option selected disabled value="">Pilih Lokasi</option>
                                <option value="1">Tidak Penting</option>
                                <option value="2">Kurang Penting</option>
                                <option value="3">Cukup Penting</option>
                                <option value="4">Penting</option>
                                <option value="5">Sangat Penting</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Keamanan</label>
                            <select name="kepentingan_keamanan" class="form-control" id="exampleFormControlSelect1" required>
                                <option selected disabled value="">Pilih Keamanan</option>
                                <option value="1">Tidak Penting</option>
                                <option value="2">Kurang Penting</option>
                                <option value="3">Cukup Penting</option>
                                <option value="4">Penting</option>
                                <option value="5">Sangat Penting</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Akses Jalan</label>
                            <select name="kepentingan_aksesjalan" class="form-control" id="exampleFormControlSelect1" required>
                                <option selected disabled value="">Pilih Akses Jalan</option>
                                <option value="1">Tidak Penting</option>
                                <option value="2">Kurang Penting</option>
                                <option value="3">Cukup Penting</option>
                                <option value="4">Penting</option>
                                <option value="5">Sangat Penting</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Jenis Kost</label>
                            <select name="jenis_kost" class="form-control" id="exampleFormControlSelect1" required>
                                <option selected value="0">Pilih Jenis Kost</option>
                                <option value="Putra">Putra</option>
                                <option value="Putri">Putri</option>
                            </select>
                        </div>


                    </div>
                    <div class="align-items-center text-center row justify-content-center">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </div>

        </div>

    </form>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nilai Kepentingan</h4>
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-1">
                        <thead>
                            <tr>

                                <th>Lokasi</th>
                                <th>Harga</th>
                                <th>Fasilitas</th>
                                <th>Jarak</th>
                                <th>Keamanan</th>
                                <th>Akses Jalan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php

                            @endphp

                            @if($alternatifterbaik == null)

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            @else

                            <tr>

                                <td>{{ $kepentingan['lokasi'] }}</td>
                                <td>{{ $kepentingan['harga'] }}</td>
                                <td>{{ $kepentingan['fasilitas'] }}</td>
                                <td>{{ $kepentingan['jarak'] }}</td>
                                <td>{{ $kepentingan['keamanan'] }}</td>
                                <td>{{ $kepentingan['aksesjalan'] }}</td>
                                <td>{{ $kepentingan['total'] }}</td>
                            </tr>


                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nilai Bobot</h4>
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-1">
                        <thead>
                            <tr>

                                <th>Lokasi</th>
                                <th>Harga</th>
                                <th>Fasilitas</th>
                                <th>Jarak</th>
                                <th>Keamanan</th>
                                <th>Akses Jalan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php

                            @endphp

                            @if($alternatifterbaik == null)

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            @else

                            <tr>

                                <td>{{ $nilaibobot['lokasi'] }}</td>
                                <td>{{ $nilaibobot['harga'] }}</td>
                                <td>{{ $nilaibobot['fasilitas'] }}</td>
                                <td>{{ $nilaibobot['jarak'] }}</td>
                                <td>{{ $nilaibobot['keamanan'] }}</td>
                                <td>{{ $nilaibobot['aksesjalan'] }}</td>
                                <td>{{ $nilaibobot['total'] }}</td>
                            </tr>


                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nilai Pangkat</h4>
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-1">
                        <thead>
                            <tr>

                                <th>Lokasi</th>
                                <th>Harga</th>
                                <th>Fasilitas</th>
                                <th>Jarak</th>
                                <th>Keamanan</th>
                                <th>Akses Jalan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php

                            @endphp

                            @if($alternatifterbaik == null)

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            @else

                            <tr>

                                <td>{{ $nilaipangkat['lokasi'] }}</td>
                                <td>{{ $nilaipangkat['harga'] }}</td>
                                <td>{{ $nilaipangkat['fasilitas'] }}</td>
                                <td>{{ $nilaipangkat['jarak'] }}</td>
                                <td>{{ $nilaipangkat['keamanan'] }}</td>
                                <td>{{ $nilaipangkat['aksesjalan'] }}</td>
                            </tr>


                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nilai Vektor S</h4>
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Nilai Vektor S</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp

                            @if($alternatifterbaik == null)

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>

                            @else

                            @foreach ($nilaisdankost as $datavektors)



                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datavektors['data']->kost->name }}</td>
                                <td>{{ $datavektors['vektorS'] }}</td>
                            </tr>

                            @endforeach


                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Simulasi Rekomendasi</h4>

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>


                    <?php

                                    $nomer = 1;

                                    ?>

                    @foreach($errors->all() as $error)
                    <li>{{ $nomer++ }}. {{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kost</th>
                                <th>Vektor V</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            $rank = 1
                            @endphp

                            @if($alternatifterbaik == null)

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            @else


                            @foreach ($alternatifterbaik as $data )
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data['data']->kost->name }}</td>
                                <td>{{ $data['vektorV'] }}</td>
                                <td>{{ $rank++}}</td>
                            </tr>
                            @endforeach

                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@if($alternatifterbaik == null)

@else
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rekomendasi Kost Terbaik Anda</h4>
                <div class="alert alert-success alert-dismissible fade show mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <p>Berdasarkan kriteria yang Anda inputkan, sistem telah melakukan penghitungan dan menemukan rekomendasi kost terbaik untuk Anda:</p>
                    <strong>Nama Kost : {{ $alternatifterbaik[0]['data']->kost->name }}</strong>
                    <br>
                    <strong>Alamat : {{ $alternatifterbaik[0]['data']->kost->alamat }}</strong>
                    <br>
                    <strong>Jenis Kost : {{ $alternatifterbaik[0]['data']->kost->jenis_kost }}</strong>
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
                    <div class="row text-center">
                        <div class="col-12">
                            <div id="map" style="height: 400px;">
                                {!! nl2br($alternatifterbaik[0]['data']->kost->maps) !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endif


@endsection

@section('script')
<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        // "lengthMenu": [
        //     [16, 32, 64, -1],
        //     [16, 32, 64, "All"]
        // ]
        dom: 'Bfrtip',


        lengthMenu: [
            [10, 25, 50, -1]
            , ['10 rows', '25 rows', '50 rows', 'Show all']
        ],

        buttons: [{
                extend: 'colvis'
                , className: 'btn btn-primary btn-sm'
                , text: 'Column Visibility',
                // columns: ':gt(0)'


            },

            {

                extend: 'pageLength'
                , className: 'btn btn-primary btn-sm'
                , text: 'Page Length',
                // columns: ':gt(0)'
            },


            // 'colvis', 'pageLength',

            {
                extend: 'excel'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            // {
            //     extend: 'csv',
            //     className: 'btn btn-primary btn-sm',
            //     exportOptions: {
            //         columns: [0, ':visible']
            //     }
            // },
            {
                extend: 'pdf'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            {
                extend: 'print'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            // 'pageLength', 'colvis',
            // 'copy', 'csv', 'excel', 'print'

        ]
    , });

</script>
@if(Session::get('store'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Ditambahkan'
    , });

</script>
@endif
@if(Session::get('update'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Diubah'
    , });

</script>
@endif
@if(Session::get('delete'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Dihapus'
    , });

</script>
@endif
@if(Session::get('gagal'))
<script>
    Swal.fire({
        icon: 'error'
        , title: 'Oops..'
        , text: 'Data Masih Memiliki Relasi'
    , });

</script>
@endif
@endsection
