@extends('admin.layouts.main')

@section('title', 'Kost')


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Kost</h4>

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
                    <div class="align-right text-right mb-3">
                        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i><span> Tambah</span></button>
                    </div>
                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($kost as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ asset('fotokost/'.$data->foto) }}" alt="" class="img-rounded" width="100px"></td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="/detail-foto-kost/{{ $data->id }}">Detail Foto</a>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{ $data->id }}"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $data->id }}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $data->id }}"><i class="fas fa-trash"></i></button>
                                </td>

                            </tr>

                            <!-- Detail Delete -->

                            <div id="detail{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Detail</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="m-2">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <li>{{ $data->name }}</li>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Price</label>
                                                    <li>Rp. {{ number_format($data->price) }}</li>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Alamat</label>
                                                    <li>{{ $data->alamat }}</li>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">No Pemilik</label>
                                                    <li>{{ $data->no_pemilik }}</li>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Jenis Kost</label>
                                                    <li>{{ $data->jenis_kost }}</li>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Deskripsi</label>
                                                    <li>{{ $data->deskripsi }}</li>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Akses Jalan</label>
                                                    <li>{{ $data->aksesjalan->name }}</li>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Fasilitas</label>
                                                    <li>{{ $data->fasilitas->name }}</li>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Keamanan</label>
                                                    <li>{{ $data->keamanan->name }}</li>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Harga</label>
                                                    <li>{{ $data->harga->name }}</li>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Jarak</label>
                                                    <li>{{ $data->jarak->name }}</li>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Lokasi</label>
                                                    <li>{{ $data->lokasi->name }}</li>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete -->

                            <div id="delete{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Delete</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/kost/{{ $data->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">

                                                <p>Anda yakin ingin menghapus data {{ $data->name }} ?</p>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal Edit -->
                            <div id="edit{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edit</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/kost/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <input name="name" value="{{ $data->name }}" type="text" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Harga</label>
                                                    <input name="price" value="{{ $data->price }}" type="text" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Alamat</label>
                                                    <textarea name="alamat" class="form-control" id="" cols="30" rows="3" required>{{ $data->alamat }}</textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Maps</label>
                                                    <input name="maps" value="{{ $data->maps }}" type="text" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="3" required>{{ $data->deskripsi }}</textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">No Pemilik</label>
                                                    <input name="no_pemilik" value="{{ $data->no_pemilik }}" type="text" class="form-control" required>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Jenis Kost</label>
                                                    <select name="jenis_kost" class="form-control" id="exampleFormControlSelect1" required>
                                                        @if ($data->jenis_kost == 'Putra')
                                                        <option selected value="Putra">Putra</option>
                                                        <option value="Putri">Putri</option>
                                                        @else
                                                        <option value="Putra">Putra</option>
                                                        <option selected value="Putri">Putri</option>
                                                        @endif
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Foto</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                        <div class="custom-file">
                                                            <input name="foto" type="file" class="custom-file-input" id="inputGroupFile01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Jarak</label>
                                                    <select name="id_jarak" class="form-control" id="exampleFormControlSelect1" required>
                                                        <option selected value="{{ $data->jarak->id }}">{{ $data->jarak->name }}</option>
                                                        @foreach($jarak as $datajarak)
                                                        <option value="{{ $datajarak->id }}">{{ $datajarak->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Fasilitas</label>
                                                    <select name="id_fasilitas" class="form-control" id="exampleFormControlSelect1" required>
                                                        <option selected value="{{ $data->fasilitas->id }}">{{ $data->fasilitas->name }}</option>
                                                        @foreach($fasilitas as $datafasilitas)
                                                        <option value="{{ $datafasilitas->id }}">{{ $datafasilitas->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Harga</label>
                                                    <select name="id_harga" class="form-control" id="exampleFormControlSelect1" required>
                                                        <option selected value="{{ $data->harga->id }}">{{ $data->harga->name }}</option>
                                                        @foreach($harga as $dataharga)
                                                        <option value="{{ $dataharga->id }}">{{ $dataharga->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Lokasi</label>
                                                    <select name="id_lokasi" class="form-control" id="exampleFormControlSelect1" required>
                                                        <option selected value="{{ $data->lokasi->id }}">{{ $data->lokasi->name }}</option>
                                                        @foreach($lokasi as $datalokasi)
                                                        <option value="{{ $datalokasi->id }}">{{ $datalokasi->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Keamanan</label>
                                                    <select name="id_keamanan" class="form-control" id="exampleFormControlSelect1" required>
                                                        <option selected value="{{ $data->keamanan->id }}">{{ $data->keamanan->name }}</option>
                                                        @foreach($keamanan as $datakeamanan)
                                                        <option value="{{ $datakeamanan->id }}">{{ $datakeamanan->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Akses Jalan</label>
                                                    <select name="id_aksesjalan" class="form-control" id="exampleFormControlSelect1" required>
                                                        <option selected value="{{ $data->aksesjalan->id }}">{{ $data->aksesjalan->name }}</option>
                                                        @foreach($aksesjalan as $dataaksesjalan)
                                                        <option value="{{ $dataaksesjalan->id }}">{{ $dataaksesjalan->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Modal Add -->
                <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="/kost" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Name</label>
                                        <input name="name" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Harga</label>
                                        <input name="price" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="" cols="30" rows="3" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Maps</label>
                                        <input name="maps" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="" cols="30" rows="3" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">No Pemilik</label>
                                        <input name="no_pemilik" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Jenis Kost</label>
                                        <select name="jenis_kost" class="form-control" id="exampleFormControlSelect1" required>
                                            <option selected disabled value="">Pilih Jenis Kost</option>
                                            <option value="Putra">Putra</option>
                                            <option value="Putri">Putri</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Foto</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input name="foto" type="file" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Jarak</label>
                                        <select name="id_jarak" class="form-control" id="exampleFormControlSelect1" required>
                                            <option selected disabled value="">Pilih Jarak</option>
                                            @foreach($jarak as $datajarak)
                                            <option value="{{ $datajarak->id }}">{{ $datajarak->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Fasilitas</label>
                                        <select name="id_fasilitas" class="form-control" id="exampleFormControlSelect1" required>
                                            <option selected disabled value="">Pilih Fasilitas</option>
                                            @foreach($fasilitas as $datafasilitas)
                                            <option value="{{ $datafasilitas->id }}">{{ $datafasilitas->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Harga</label>
                                        <select name="id_harga" class="form-control" id="exampleFormControlSelect1" required>
                                            <option selected disabled value="">Pilih Harga</option>
                                            @foreach($harga as $dataharga)
                                            <option value="{{ $dataharga->id }}">{{ $dataharga->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Lokasi</label>
                                        <select name="id_lokasi" class="form-control" id="exampleFormControlSelect1" required>
                                            <option selected disabled value="">Pilih Lokasi</option>
                                            @foreach($lokasi as $datalokasi)
                                            <option value="{{ $datalokasi->id }}">{{ $datalokasi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Keamanan</label>
                                        <select name="id_keamanan" class="form-control" id="exampleFormControlSelect1" required>
                                            <option selected disabled value="">Pilih Keamanan</option>
                                            @foreach($keamanan as $datakeamanan)
                                            <option value="{{ $datakeamanan->id }}">{{ $datakeamanan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Akses Jalan</label>
                                        <select name="id_aksesjalan" class="form-control" id="exampleFormControlSelect1" required>
                                            <option selected disabled value="">Pilih Akses Jalan</option>
                                            @foreach($aksesjalan as $dataaksesjalan)
                                            <option value="{{ $dataaksesjalan->id }}">{{ $dataaksesjalan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
@if(Session::get('destroy'))
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
