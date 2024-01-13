@extends('landing.layouts.main')

@section('title', 'Login - e-Kostan')

@section('content')


<section id="login" class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="justify-content-center row">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
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
                <form action="/login" method="POST">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Login
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="text" name="email" placeholder="Your Email Address" required>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="password" name="password" placeholder="Your Password" required>
                    </div>


                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Login
                    </button>

                </form>
                <div class="text-center mt-3">
                    <p>Dont have a account ? <a href="/registeruser/#register">Register</a></p>
                    <p>Forgot your password ? <a href="/resetpassword/#reset">Reset Password</a></p>
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
