@extends('landing.layouts.main')

@section('title', 'Change Password - e-Kostan')

@section('content')
<section class="section-slide">
    <div class="wrap-slick1 rs2-slick1">
        <div class="slick1">
            <div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('landing/images/slide-05.jpg') }});" data-thumb="{{ asset('landing/images/thumb-01.jpg') }}" data-caption="Women’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                Women Collection 2018
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                New arrivals
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('landing/images/slide-06.jpg') }});" data-thumb="{{ asset('landing/images/thumb-02.jpg') }}" data-caption="Men’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                Men New-Season
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                Jackets & Coats
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('landing/images/slide-07.jpg') }});" data-thumb="{{ asset('landing/images/thumb-03.jpg') }}" data-caption="Men’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                Men Collection 2018
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                NEW SEASON
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap-slick1-dots p-lr-10"></div>
    </div>
</section>

{{-- <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('landing/images/bg-01.jpg') }}');">
<h2 class="ltext-105 cl0 txt-center">
    Login
</h2>
</section> --}}

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
