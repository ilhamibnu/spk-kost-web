@extends('landing.layouts.main')

@section('title', 'Change Password - e-Kostan')

@section('content')

<section id="reset" class="bg0 p-t-104 p-b-116">
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
                <form action="/updatepassword" method="POST">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Change Password
                    </h4>

                    <input hidden value="{{ $user->code }}" name="code" type="text">
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="password" name="password" placeholder="Your Password" required>
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="password" name="repassword" placeholder="Your Password" required>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Change Passwod
                    </button>

                </form>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
@if(Session::get('resetpassword'))
<script>
    swal({
        title: "Berhasil"
        , text: "Link telah dikirim ke email anda"
        , icon: "success"
        , button: "OK"
    , });

</script>
@endif
@if(Session::get('emailtidakada'))
<script>
    swal({
        title: "Gagal"
        , text: "Email tidak terdaftar"
        , icon: "error"
        , button: "OK"
    , });

</script>
@endif
@endsection
