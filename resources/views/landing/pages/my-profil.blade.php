@extends('landing.layouts.main')

@section('title', 'My Profil - e-Kostan')

@section('content')
<section id="myprofil" class="bg0 p-t-104 p-b-116">
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
                <form action="/updateprofil" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        My Profil
                    </h4>
                    <div class="text-center mb-2 mt-2">
                        <img src="{{ asset('fotouser/'.Auth::user()->image) }}" alt="IMG" style="width: 100px; height: 100px; border-radius: 50%;">
                    </div>

                    @if(Auth::user()->type == 'google')

                    <input hidden value="{{ Auth::user()->id }}" type="text">

                    {{-- // image upload --}}
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="file" name="image" placeholder="Your Image">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Your Full Name">
                    </div>

                    <div hidden class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="text" name="email" value="{{ Auth::user()->email }}" placeholder="Your Email Address">
                    </div>

                    <div hidden class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="password" name="password" placeholder="Your Password">
                    </div>

                    <div hidden class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="password" name="repassword" placeholder="Your Password">
                    </div>
                    @else

                    <input hidden value="{{ Auth::user()->id }}" type="text">

                    {{-- // image upload --}}
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="file" name="image" placeholder="Your Image">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Your Full Name">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="text" name="email" value="{{ Auth::user()->email }}" placeholder="Your Email Address">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="password" name="password" placeholder="Your Password">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28 p-tb-25" type="password" name="repassword" placeholder="Your Password">
                    </div>


                    @endif



                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Update
                    </button>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

@if($errors->any())
<script>
    swal({
        title: "Gagal"
        , text: "Profil gagal diupdate"
        , icon: "error"
        , button: "OK"
    , });

</script>
@endif

@if(Session::get('update'))
<script>
    swal({
        title: "Berhasil"
        , text: "Profil berhasil diupdate"
        , icon: "success"
        , button: "OK"
    , });

</script>

@endif
@endsection
