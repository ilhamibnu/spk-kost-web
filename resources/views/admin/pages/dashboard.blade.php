@extends('admin.layouts.main')

@section('title', 'Dashboard')


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Dashboard</h4>
                <!-- Informasi Sistem Informasi Pendukung Keputusan -->
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block text-center">
                                <h6 class="m-b-20">Total Kost</h6>
                                <h2 class="text-center ">
                                    <span>{{ $jumlah_kost }}</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block text-center">
                                <h6 class="m-b-20">Total Kriteria</h6>
                                <h2 class="text-center">
                                    <span>{{ $jumlah_kriteria }}</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block text-center">
                                <h6 class="m-b-20">Jumlah User</h6>
                                <h2 class="text-center">
                                    <span>{{ $jumlah_user }}</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5 class="card-title">Sistem Informasi Pendukung Keputusan (SPK) Pemilihan Kost</h5>
                        <p>
                            Sistem Informasi Pendukung Keputusan (SPK) Pemilihan Kost menggunakan metode Weight Product
                            adalah sebuah sistem yang bertujuan untuk membantu pengguna dalam memilih kost yang
                            sesuai dengan kriteria yang dimiliki. Sistem ini akan melakukan perhitungan dan
                            memberikan rekomendasi kost terbaik berdasarkan bobot yang telah ditentukan.
                        </p>
                        <h5 class="card-title">Masalah</h5>
                        <p>
                            Masalah yang dihadapi dalam pemilihan kost adalah banyaknya pilihan kost yang
                            tersedia dengan beragam fasilitas dan harga sewa yang berbeda-beda, sehingga
                            seringkali pengguna kesulitan dalam memilih kost yang sesuai dengan kebutuhan dan
                            preferensi mereka.
                        </p>
                        <h5 class="card-title">Tujuan</h5>
                        <p>
                            Tujuan dari pengembangan sistem ini adalah untuk memudahkan pengguna dalam
                            memilih kost yang sesuai dengan kebutuhan dan preferensi mereka, serta untuk
                            meningkatkan efisiensi dalam proses pemilihan kost.
                        </p>
                        <h5 class="card-title">Manfaat</h5>
                        <p>
                            Manfaat yang diperoleh dari penggunaan sistem ini adalah pengguna dapat
                            mendapatkan rekomendasi kost yang lebih sesuai dengan kebutuhan mereka dalam
                            waktu yang lebih singkat dan efisien.
                        </p>
                        <h5 class="card-title">Fitur</h5>
                        <ul>
                            <li>Perhitungan Weight Product</li>
                            <li>Rekomendasi Kost Terbaik</li>
                            <li>Pencarian Kost Berdasarkan Kriteria</li>
                            <li>Informasi Detail Kost</li>
                            <!-- tambahkan fitur lainnya sesuai dengan kebutuhan -->
                        </ul>
                    </div>
                </div>
                <!-- End Informasi Sistem Informasi Pendukung Keputusan -->
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Table Kriteria</h4>
                <div class="table-responsive">
                    <table id="table-kriteria" class="table table-striped table-bordered display no-wrap">
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                <th>Deskripsi</th>
                                <th>Bobot</th>
                                <th>Jenis Kriteria</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriteria as $data_kriteria)
                            <tr>
                                <td>{{ $data_kriteria->name }}</td>
                                @if ($data_kriteria->name == 'Jarak')
                                <td>
                                    @foreach ($jarak as $data_jarak)
                                    {{ $data_jarak->name }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($jarak as $data_jarak)
                                    {{ $data_jarak->bobot }} <br>
                                    @endforeach
                                </td>
                                @elseif ($data_kriteria->name == 'Fasilitas')
                                <td>
                                    @foreach ($fasilitas as $data_fasilitas)
                                    {{ $data_fasilitas->name }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($fasilitas as $data_fasilitas)
                                    {{ $data_fasilitas->bobot }} <br>
                                    @endforeach
                                </td>
                                @elseif ($data_kriteria->name == 'Harga')
                                <td>
                                    @foreach ($harga as $data_harga)
                                    {{ $data_harga->name }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($harga as $data_harga)
                                    {{ $data_harga->bobot }} <br>
                                    @endforeach
                                </td>
                                @elseif ($data_kriteria->name == 'Lokasi')
                                <td>
                                    @foreach ($lokasi as $data_lokasi)
                                    {{ $data_lokasi->name }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($lokasi as $data_lokasi)
                                    {{ $data_lokasi->bobot }} <br>
                                    @endforeach
                                </td>
                                @elseif ($data_kriteria->name == 'Keamanan')
                                <td>
                                    @foreach ($keamanan as $data_keamanan)
                                    {{ $data_keamanan->name }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($keamanan as $data_keamanan)
                                    {{ $data_keamanan->bobot }} <br>
                                    @endforeach
                                </td>
                                @elseif ($data_kriteria->name == 'Akses Jalan')
                                <td>
                                    @foreach ($aksesjalan as $data_akses_jalan)
                                    {{ $data_akses_jalan->name }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($aksesjalan as $data_akses_jalan)
                                    {{ $data_akses_jalan->bobot }} <br>
                                    @endforeach
                                </td>
                                @endif
                                <td>{{ $data_kriteria->jenis }}</td>
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
