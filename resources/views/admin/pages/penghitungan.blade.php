@extends('admin.layouts.main')

@section('title', 'Penghitungan')


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Penghitungan</h4>

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
                <div class="text-center">
                    <h4 class="card-title">Data Alternatif Kost</h4>
                </div>
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kost</th>
                                <th>Jarak</th>
                                <th>Fasilitas</th>
                                <th>Harga</th>
                                <th>Lokasi</th>
                                <th>Keamanan</th>
                                <th>Akses Jalan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($alternatif as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kost->name }}</td>
                                <td>{{ $data->jarak->bobot }}</td>
                                <td>{{ $data->fasilitas->bobot }}</td>
                                <td>{{ $data->harga->bobot }}</td>
                                <td>{{ $data->lokasi->bobot }}</td>
                                <td>{{ $data->keamanan->bobot }}</td>
                                <td>{{ $data->aksesjalan->bobot }}</td>
                            </tr>
                            @endforeach
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
                <h4 class="card-title">Penghitungan</h4>

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
                <div class="text-center">
                    <h4 class="card-title">Data Bobot Kepentingan</h4>
                </div>
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-2">
                        <thead>

                            <tr>
                                <th></th>
                                @foreach ($kriteria as $data)
                                <th>{{ $data->name }}</th>
                                @endforeach
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th>Bobot Kepentingan</th>
                                @foreach ($kriteria as $data)
                                <?php
                                    $jumlah = DB::table('tb_kriteria')->sum('kepentingan');
                                ?>
                                <td>{{ $data->kepentingan / $jumlah }}</td>
                                @endforeach
                                <td>
                                    <?php

                                    // jumlahkan semua nilai kepentingan pada tabel kriteria
                                    $jumlah = DB::table('tb_kriteria')->sum('kepentingan');

                                    // tiap nilai kepentingan dibagi dengan jumlah nilai kepentingan kemudian dijumlahkan
                                    $jumlah_bobot = 0;
                                    foreach ($kriteria as $data) {
                                        $jumlah_bobot += $data->kepentingan / $jumlah;
                                    }

                                    // tampilkan jumlah bobot
                                    echo $jumlah_bobot;
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <th>Kepentingan</th>
                                @foreach ($kriteria as $data)
                                <td>{{ $data->kepentingan }}</td>
                                @endforeach
                                <td>
                                    <?php
                                    $jumlah = DB::table('tb_kriteria')->sum('kepentingan');
                                    echo $jumlah;
                                    ?>
                                </td>
                            </tr>
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
                <h4 class="card-title">Penghitungan</h4>

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
                <div class="text-center">
                    <h4 class="card-title">Data Penghitungan Pangkat</h4>
                </div>
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-3">
                        <thead>

                            <tr>
                                <th></th>
                                @foreach ($kriteria as $data)
                                <th>{{ $data->name }}</th>
                                @endforeach

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th>Jenis</th>
                                @foreach ($kriteria as $data)

                                <td>{{ $data->jenis }}</td>
                                @endforeach

                            </tr>

                            <tr>
                                <th>Pangkat</th>
                                @foreach ($kriteria as $data)

                                <td>
                                    <?php
                                    $jumlah = DB::table('tb_kriteria')->sum('kepentingan');
                                    // jika jenis kriteria adalah cost maka pangkatnya adalah -1 dan jika bukan maka pangkatnya adalah 1, tampilkan nilai - nya
                                    if ($data->jenis == 'Cost') {
                                        echo -1 * pow($data->kepentingan / $jumlah, 1);
                                    } else {
                                        echo pow($data->kepentingan / $jumlah, 1);
                                    }

                                    ?>
                                </td>

                                @endforeach

                            </tr>
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
                <h4 class="card-title">Penghitungan</h4>

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
                <div class="text-center">
                    <h4 class="card-title">Data Penghitungan Vektor S</h4>
                </div>
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-4">
                        <thead>

                            <tr>
                                <th>Name</th>
                                <th>Nilai Vektor S</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatif as $dataAlternatif)
                            <tr>
                                <td>{{ $dataAlternatif->kost->name }}</td>
                                <td>
                                    <?php
                                    $jumlah = DB::table('tb_kriteria')->sum('kepentingan');


                                    foreach ($kriteria as $dataKriteria) {
                                        $pangkat = ($dataKriteria->jenis == 'Cost') ? -1 * pow($dataKriteria->kepentingan / $jumlah, 1) : pow($dataKriteria->kepentingan / $jumlah, 1);

                                        $pangkat_kriteria[] = $pangkat;
                                    }

                                        echo pow($dataAlternatif->jarak->bobot, $pangkat_kriteria[0]) * pow($dataAlternatif->fasilitas->bobot, $pangkat_kriteria[1]) * pow($dataAlternatif->harga->bobot, $pangkat_kriteria[2]) * pow($dataAlternatif->lokasi->bobot, $pangkat_kriteria[3]) * pow($dataAlternatif->keamanan->bobot, $pangkat_kriteria[4]) * pow($dataAlternatif->aksesjalan->bobot, $pangkat_kriteria[5]);
                                    ?>


                                </td>
                            </tr>
                            @endforeach
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
                <h4 class="card-title">Penghitungan</h4>

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
                <div class="text-center">
                    <h4 class="card-title">Data Penghitungan Vektor V</h4>
                </div>
                <div class="table-responsive">
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-5">
                        <thead>

                            <tr>
                                <th>Name</th>
                                <th>Nilai Vektor V</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatif as $dataAlternatif)
                            <tr>
                                <td>{{ $dataAlternatif->kost->name }}</td>
                                <td>
                                    @php
                                    $jumlah = DB::table('tb_kriteria')->sum('kepentingan');


                                    foreach ($kriteria as $dataKriteria) {
                                    $pangkat = ($dataKriteria->jenis == 'Cost') ? -1 * pow($dataKriteria->kepentingan / $jumlah, 1) : pow($dataKriteria->kepentingan / $jumlah, 1);

                                    $pangkat_kriteria[] = $pangkat;
                                    }

                                    // hitung total vektor s per alternatif
                                    $total_vektor_s = pow($dataAlternatif->jarak->bobot, $pangkat_kriteria[0]) * pow($dataAlternatif->fasilitas->bobot, $pangkat_kriteria[1]) * pow($dataAlternatif->harga->bobot, $pangkat_kriteria[2]) * pow($dataAlternatif->lokasi->bobot, $pangkat_kriteria[3]) * pow($dataAlternatif->keamanan->bobot, $pangkat_kriteria[4]) * pow($dataAlternatif->aksesjalan->bobot, $pangkat_kriteria[5]);

                                    // hitung total vektor s semua alternatif
                                    $total_vektor_s_semua_alternatif = 0;
                                    foreach ($alternatif as $dataAlternatif) {
                                    $total_vektor_s_semua_alternatif += pow($dataAlternatif->jarak->bobot, $pangkat_kriteria[0]) * pow($dataAlternatif->fasilitas->bobot, $pangkat_kriteria[1]) * pow($dataAlternatif->harga->bobot, $pangkat_kriteria[2]) * pow($dataAlternatif->lokasi->bobot, $pangkat_kriteria[3]) * pow($dataAlternatif->keamanan->bobot, $pangkat_kriteria[4]) * pow($dataAlternatif->aksesjalan->bobot, $pangkat_kriteria[5]);
                                    }

                                    // hitung nilai vektor v
                                    echo $total_vektor_s / $total_vektor_s_semua_alternatif;
                                    @endphp
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
<script>
    $('#dataTable-2').DataTable({
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
<script>
    $('#dataTable-3').DataTable({
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
<script>
    $('#dataTable-4').DataTable({
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
<script>
    $('#dataTable-5').DataTable({
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
