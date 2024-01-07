@extends('layouts.main')

@section('title', 'Kriteria')


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Kriteria</h4>

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
                                <th>Name</th>
                                <th>Kepentingan</th>
                                <th>Jenis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($kriteria as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->kepentingan }}</td>
                                <td>{{ $data->jenis }}</td>

                                <td>

                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $data->id }}"><i class="fas fa-pencil-alt"></i></button>

                                </td>


                            </tr>

                            <!-- Modal Edit -->
                            <div id="edit{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edit</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/kriteria/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <input name="name" value="{{ $data->name }}" type="text" class="form-control">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Kepentingan</label>
                                                    <select name="kepentingan" class="form-control" id="exampleFormControlSelect1">

                                                        @if($data->kepentingan == 1)
                                                        <option selected value="{{ $data->kepentingan }}">Tidak Penting</option>
                                                        <option value="2">Kurang Penting</option>
                                                        <option value="3">Cukup Penting</option>
                                                        <option value="4">Penting</option>
                                                        <option value="5">Sangat Penting</option>
                                                        @elseif($data->kepentingan == 2)
                                                        <option selected value="{{ $data->kepentingan }}">Kurang Penting</option>
                                                        <option value="1">Tidak Penting</option>
                                                        <option value="3">Cukup Penting</option>
                                                        <option value="4">Penting</option>
                                                        <option value="5">Sangat Penting</option>
                                                        @elseif($data->kepentingan == 3)
                                                        <option selected value="{{ $data->kepentingan }}">Cukup Penting</option>
                                                        <option value="1">Tidak Penting</option>
                                                        <option value="2">Kurang Penting</option>
                                                        <option value="4">Penting</option>
                                                        <option value="5">Sangat Penting</option>
                                                        @elseif($data->kepentingan == 4)
                                                        <option selected value="{{ $data->kepentingan }}">Penting</option>
                                                        <option value="1">Tidak Penting</option>
                                                        <option value="2">Kurang Penting</option>
                                                        <option value="3">Cukup Penting</option>
                                                        <option value="5">Sangat Penting</option>
                                                        @elseif($data->kepentingan == 5)
                                                        <option selected value="{{ $data->kepentingan }}">Sangat Penting</option>
                                                        <option value="1">Tidak Penting</option>
                                                        <option value="2">Kurang Penting</option>
                                                        <option value="3">Cukup Penting</option>
                                                        <option value="4">Penting</option>

                                                        @endif


                                                    </select>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">Jenis</label>
                                                    <select name="jenis" class="form-control" id="exampleFormControlSelect1">
                                                        <option selected value="{{ $data->kepentingan }}">{{ $data->kepentingan }}</option>
                                                        <option value="Benefit">Benefit</option>
                                                        <option value="Cost">Cost</option>

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
