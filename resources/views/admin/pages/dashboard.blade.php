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

@endsection
