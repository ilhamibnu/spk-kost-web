@extends('admin.layouts.main')

@section('title', 'Sub Kriteria')


@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Jarak</h4>

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
                        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addJarak"><i class="fas fa-plus"></i><span> Tambah</span></button>
                    </div>

                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Bobot</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($jarak as $datajarak)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datajarak->name }}</td>
                                <td>{{ $datajarak->bobot }}</td>

                                <td>
                                    {{-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{ $data->id }}"><i class="fas fa-eye"></i></button> --}}
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editJarak{{ $datajarak->id }}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteJarak{{ $datajarak->id }}"><i class="fas fa-trash"></i></button>
                                </td>


                            </tr>

                            <!-- Modal Delete -->

                            <div id="deleteJarak{{ $datajarak->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Delete Jarak</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/jarak/{{ $datajarak->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">

                                                <p>Anda yakin ingin menghapus data {{ $datajarak->name }} ?</p>

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
                            <div id="editJarak{{ $datajarak->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edit Jarak</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/jarak/{{ $datajarak->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <input name="name" value="{{ $datajarak->name }}" type="text" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Bobot</label>
                                                    <input name="bobot" value="{{ $datajarak->bobot }}" type="text" class="form-control">
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
                <div id="addJarak" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add Jarak</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="/jarak" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Name</label>
                                        <input name="name" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Bobot</label>
                                        <input name="bobot" value="" type="text" class="form-control" required>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Fasilitas</h4>

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
                        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addFasilitas"><i class="fas fa-plus"></i><span> Tambah</span></button>
                    </div>

                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Bobot</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($fasilitas as $datafasilitas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datafasilitas->name }}</td>
                                <td>{{ $datafasilitas->bobot }}</td>

                                <td>
                                    {{-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{ $data->id }}"><i class="fas fa-eye"></i></button> --}}
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editFasilitas{{ $datafasilitas->id }}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteFasilitas{{ $datafasilitas->id }}"><i class="fas fa-trash"></i></button>
                                </td>


                            </tr>

                            <!-- Modal Delete -->

                            <div id="deleteFasilitas{{ $datafasilitas->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Delete Fasilitas</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/fasilitas/{{ $datafasilitas->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">

                                                <p>Anda yakin ingin menghapus data {{ $datafasilitas->name }} ?</p>

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
                            <div id="editFasilitas{{ $datafasilitas->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edit Fasilitas</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/fasilitas/{{ $datafasilitas->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <input name="name" value="{{ $datafasilitas->name }}" type="text" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Bobot</label>
                                                    <input name="bobot" value="{{ $datafasilitas->bobot }}" type="text" class="form-control">
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
                <div id="addFasilitas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add Fasilitas</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="/fasilitas" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Name</label>
                                        <input name="name" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Bobot</label>
                                        <input name="bobot" value="" type="text" class="form-control" required>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Harga</h4>

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
                        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addHarga"><i class="fas fa-plus"></i><span> Tambah</span></button>
                    </div>

                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Bobot</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($harga as $dataharga)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $dataharga->name }}</td>
                                <td>{{ $dataharga->bobot }}</td>

                                <td>
                                    {{-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{ $data->id }}"><i class="fas fa-eye"></i></button> --}}
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editHarga{{ $dataharga->id }}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteHarga{{ $dataharga->id }}"><i class="fas fa-trash"></i></button>
                                </td>


                            </tr>

                            <!-- Modal Delete -->

                            <div id="deleteHarga{{ $dataharga->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Delete Harga</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/harga/{{ $dataharga->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">

                                                <p>Anda yakin ingin menghapus data {{ $dataharga->name }} ?</p>

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
                            <div id="editHarga{{ $dataharga->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edit Harga</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/harga/{{ $dataharga->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <input name="name" value="{{ $dataharga->name }}" type="text" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Bobot</label>
                                                    <input name="bobot" value="{{ $dataharga->bobot }}" type="text" class="form-control">
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
                <div id="addHarga" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add Harga</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="/harga" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Name</label>
                                        <input name="name" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Bobot</label>
                                        <input name="bobot" value="" type="text" class="form-control" required>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lokasi</h4>

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
                        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addLokasi"><i class="fas fa-plus"></i><span> Tambah</span></button>
                    </div>

                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Bobot</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($lokasi as $datalokasi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datalokasi->name }}</td>
                                <td>{{ $datalokasi->bobot }}</td>

                                <td>
                                    {{-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{ $data->id }}"><i class="fas fa-eye"></i></button> --}}
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editLokasi{{ $datalokasi->id }}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteLokasi{{ $datalokasi->id }}"><i class="fas fa-trash"></i></button>
                                </td>


                            </tr>

                            <!-- Modal Delete -->

                            <div id="deleteLokasi{{ $datalokasi->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Delete Lokasi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/lokasi/{{ $datalokasi->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">

                                                <p>Anda yakin ingin menghapus data {{ $datalokasi->name }} ?</p>

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
                            <div id="editLokasi{{ $datalokasi->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edit Lokasi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/lokasi/{{ $datalokasi->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <input name="name" value="{{ $datalokasi->name }}" type="text" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Bobot</label>
                                                    <input name="bobot" value="{{ $datalokasi->bobot }}" type="text" class="form-control">
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
                <div id="addLokasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add Lokasi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="/lokasi" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Name</label>
                                        <input name="name" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Bobot</label>
                                        <input name="bobot" value="" type="text" class="form-control" required>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Keamanan</h4>

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
                        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addKeamanan"><i class="fas fa-plus"></i><span> Tambah</span></button>
                    </div>

                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-5">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Bobot</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($keamanan as $datakeamanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datakeamanan->name }}</td>
                                <td>{{ $datakeamanan->bobot }}</td>

                                <td>
                                    {{-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{ $data->id }}"><i class="fas fa-eye"></i></button> --}}
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editKeamanan{{ $datakeamanan->id }}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteKeamanan{{ $datakeamanan->id }}"><i class="fas fa-trash"></i></button>
                                </td>


                            </tr>

                            <!-- Modal Delete -->

                            <div id="deleteKeamanan{{ $datakeamanan->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Delete Keamanan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/keamanan/{{ $datakeamanan->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">

                                                <p>Anda yakin ingin menghapus data {{ $datakeamanan->name }} ?</p>

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
                            <div id="editKeamanan{{ $datakeamanan->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edit Keamanan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/keamanan/{{ $datakeamanan->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <input name="name" value="{{ $datakeamanan->name }}" type="text" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Bobot</label>
                                                    <input name="bobot" value="{{ $datakeamanan->bobot }}" type="text" class="form-control">
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
                <div id="addKeamanan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add Keamanan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="/keamanan" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Name</label>
                                        <input name="name" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Bobot</label>
                                        <input name="bobot" value="" type="text" class="form-control" required>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Akses Jalan</h4>

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
                        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addAksesJalan"><i class="fas fa-plus"></i><span> Tambah</span></button>
                    </div>

                    <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-6">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Bobot</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($aksesjalan as $dataaksesjalan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $dataaksesjalan->name }}</td>
                                <td>{{ $dataaksesjalan->bobot }}</td>

                                <td>
                                    {{-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{ $data->id }}"><i class="fas fa-eye"></i></button> --}}
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAksesJalan{{ $dataaksesjalan->id }}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAksesJalan{{ $dataaksesjalan->id }}"><i class="fas fa-trash"></i></button>
                                </td>


                            </tr>

                            <!-- Modal Delete -->

                            <div id="deleteAksesJalan{{ $dataaksesjalan->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Delete Akses Jalan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/aksesjalan/{{ $dataaksesjalan->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">

                                                <p>Anda yakin ingin menghapus data {{ $dataaksesjalan->name }} ?</p>

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
                            <div id="editAksesJalan{{ $dataaksesjalan->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edit Akses Jalan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/aksesjalan/{{ $dataaksesjalan->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <input name="name" value="{{ $dataaksesjalan->name }}" type="text" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Bobot</label>
                                                    <input name="bobot" value="{{ $dataaksesjalan->bobot }}" type="text" class="form-control">
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
                <div id="addAksesJalan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add Akses Jalan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="/aksesjalan" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Name</label>
                                        <input name="name" value="" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Bobot</label>
                                        <input name="bobot" value="" type="text" class="form-control" required>
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
<script>
    $('#dataTable-6').DataTable({
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
