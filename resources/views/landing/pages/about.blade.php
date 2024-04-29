@extends('landing.layouts.main')

@section('title', 'About - e-Kostan')

@section('content')


<section id="about" class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Sistem Pendukung Keputusan untuk Manajemen Kost dengan Metode Weighted Product
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Sistem Pendukung Keputusan (SPK) untuk manajemen kost menggunakan metode Weighted Product adalah sebuah sistem yang dirancang untuk membantu dalam pengambilan keputusan terkait dengan pemilihan kost. Metode Weighted Product digunakan untuk menghitung nilai preferensi relatif dari berbagai alternatif berdasarkan kriteria yang telah ditentukan.
                    </p>
                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="https://i.pinimg.com/564x/9f/18/e7/9f18e722622b51be7f98b8f073208869.jpg" alt="IMG">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Manfaat SPK Kost dengan Metode Weighted Product
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Adapun manfaat dari penggunaan SPK ini antara lain:
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        <li class="stext-113">1. Membantu calon penyewa dalam mengambil keputusan yang lebih tepat dan efisien.</li>
                        <li class="stext-113">2. Mengurangi risiko kesalahan dalam pemilihan kost karena penggunaan metode analisis yang terstruktur.</li>
                        <li class="stext-113">3. Mempercepat proses pengambilan keputusan dengan menyajikan rekomendasi kost yang sudah dihitung secara otomatis.</li>
                        <li class="stext-113">4. Meningkatkan kepuasan calon penyewa dengan menyediakan pilihan kost yang lebih sesuai dengan kebutuhan mereka.</li>
                    </p>


                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="https://i.pinimg.com/736x/7c/ec/7c/7cec7ca35893b5e2573655fd6452cf88.jpg" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="" class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Fungsi SPK Kost dengan Metode Weighted Product
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        SPK ini memiliki beberapa fungsi utama, di antaranya:
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        <li class="stext-113">1. Mengumpulkan data tentang kost dan kriteria yang diperlukan dari calon penyewa.</li>
                        <li class="stext-113">2. Menganalisis data untuk menghitung nilai preferensi relatif dari setiap alternatif kost.</li>
                        <li class="stext-113">3. Menyajikan rekomendasi kost yang paling optimal berdasarkan perhitungan yang telah dilakukan.</li>
                        <li class="stext-113">4. Memungkinkan pengguna untuk melakukan penyesuaian terhadap kriteria atau preferensi mereka sesuai kebutuhan.</li>
                    </p>


                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="https://i.pinimg.com/736x/9a/8a/c0/9a8ac0feef8358c88232748531cf6afc.jpg" alt="IMG">
                    </div>
                </div>
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
