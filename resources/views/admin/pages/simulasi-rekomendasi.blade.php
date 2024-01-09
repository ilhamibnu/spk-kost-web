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





                        {{-- <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Jarak</label>
                            <select name="id_jarak" class="form-control" id="exampleFormControlSelect1" required>
                                <option selected disabled value="">Pilih Jarak</option>
                                @foreach($jarak as $datajarak)
                                <option value="{{ $datajarak->id }}">{{ $datajarak->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="exampleFormControlSelect1">Fasilitas</label>
                        <select name="id_fasilitas" class="form-control" id="exampleFormControlSelect1" required>
                            <option selected disabled value="">Pilih Fasilitas</option>
                            @foreach($fasilitas as $datafasilitas)
                            <option value="{{ $datafasilitas->id }}">{{ $datafasilitas->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="exampleFormControlSelect1">Harga</label>
                        <select name="id_harga" class="form-control" id="exampleFormControlSelect1" required>
                            <option selected disabled value="">Pilih Harga</option>
                            @foreach($harga as $dataharga)
                            <option value="{{ $dataharga->id }}">{{ $dataharga->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="exampleFormControlSelect1">Lokasi</label>
                        <select name="id_lokasi" class="form-control" id="exampleFormControlSelect1" required>
                            <option selected disabled value="">Pilih Lokasi</option>
                            @foreach($lokasi as $datalokasi)
                            <option value="{{ $datalokasi->id }}">{{ $datalokasi->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-md-3">
                        <label for="exampleFormControlSelect1">Keamanan</label>
                        <select name="id_keamanan" class="form-control" id="exampleFormControlSelect1" required>
                            <option selected disabled value="">Pilih Keamanan</option>
                            @foreach($keamanan as $datakeamanan)
                            <option value="{{ $datakeamanan->id }}">{{ $datakeamanan->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="exampleFormControlSelect1">Akses Jalan</label>
                        <select name="id_aksesjalan" class="form-control" id="exampleFormControlSelect1" required>
                            <option selected disabled value="">Pilih Akses Jalan</option>
                            @foreach($aksesjalan as $dataaksesjalan)
                            <option value="{{ $dataaksesjalan->id }}">{{ $dataaksesjalan->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}

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


                            @foreach ($alternatifterbaik as $data )
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data['data']->kost->name }}</td>
                                <td>{{ $data['vektorV'] }}</td>
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
