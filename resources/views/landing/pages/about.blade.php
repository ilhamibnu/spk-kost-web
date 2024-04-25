@extends('landing.layouts.main')

@section('title', 'Login - e-Kostan')

@section('content')


<section id="about" class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="justify-content-center row">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <div class="text-center mt-5 mb-5 ml-3 mr-3">
                    <h2 class="txt4 p-b-25">Sistem Pendukung Keputusan untuk Manajemen Kost dengan Metode Weighted Product</h2>
                    <p class="mb-4">Sistem Pendukung Keputusan (SPK) untuk manajemen kost menggunakan metode Weighted Product adalah sebuah sistem yang dirancang untuk membantu dalam pengambilan keputusan terkait dengan pemilihan kost. Metode Weighted Product digunakan untuk menghitung nilai preferensi relatif dari berbagai alternatif berdasarkan kriteria yang telah ditentukan.</p>
                </div>
                <h3>Manfaat SPK Kost dengan Metode Weighted Product</h3>
                <p class="mb-4">Adapun manfaat dari penggunaan SPK ini antara lain:</p>
                <ul class="mb-4">
                    <li>1. Membantu calon penyewa dalam mengambil keputusan yang lebih tepat dan efisien.</li>
                    <li>2. Mengurangi risiko kesalahan dalam pemilihan kost karena penggunaan metode analisis yang terstruktur.</li>
                    <li>3. Mempercepat proses pengambilan keputusan dengan menyajikan rekomendasi kost yang sudah dihitung secara otomatis.</li>
                    <li>4. Meningkatkan kepuasan calon penyewa dengan menyediakan pilihan kost yang lebih sesuai dengan kebutuhan mereka.</li>
                </ul>
                <h3>Fungsi SPK Kost dengan Metode Weighted Product</h3>
                <p class="mb-4">SPK ini memiliki beberapa fungsi utama, di antaranya:</p>
                <ul class="mb-4">
                    <li>1. Mengumpulkan data tentang kost dan kriteria yang diperlukan dari calon penyewa.</li>
                    <li>2. Menganalisis data untuk menghitung nilai preferensi relatif dari setiap alternatif kost.</li>
                    <li>3. Menyajikan rekomendasi kost yang paling optimal berdasarkan perhitungan yang telah dilakukan.</li>
                    <li>4. Memungkinkan pengguna untuk melakukan penyesuaian terhadap kriteria atau preferensi mereka sesuai kebutuhan.</li>
                </ul>


            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
@if(Session::get('errorpw'))
<script>
    swal({
        title: "Gagal"
        , text: "Password yang anda masukkan salah"
        , icon: "error"
        , button: "OK"
    , });

</script>
@endif
@if(Session::get('erroremail'))
<script>
    swal({
        title: "Gagal"
        , text: "Email yang anda masukkan salah"
        , icon: "error"
        , button: "OK"
    , });

</script>
@endif
@if(Session::get('linkkadaluarsa'))
<script>
    swal({
        title: "Gagal"
        , text: "Link yang anda masukkan sudah kadaluarsa"
        , icon: "error"
        , button: "OK"
    , });

</script>
@endif
@if(Session::get('resetpasswordberhasil'))
<script>
    swal({
        title: "Berhasil"
        , text: "Password anda berhasil diubah"
        , icon: "success"
        , button: "OK"
    , });

</script>
@endif
@endsection
