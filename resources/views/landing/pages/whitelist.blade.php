@extends('landing.layouts.main')

@section('title', 'Whitelist - e-Kostan')

@section('content')



<!-- Product -->
<section id="whitelist" class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Whitelist
            </h3>
        </div>
        <div class="flex-w flex-sb-m p-b-52">
        </div>
        <div id="test">
            <div class="row">
                @include('landing.data.whitelist')
            </div>
        </div>
        <div class="ajax-load text-center" style="display:none">
            <p><img width="70px" height="70px" src="{{ asset('landing/images/icons/loading-2.gif') }}"></p>
        </div>
        <div class="justify-content-center text-center">
            <button id="loadmore" class="stext-103 cl2 size-102 bg0 bor4 hov-btn1 p-lr-15 trans-04">Load More</button>
        </div>
    </div>
</section>
@endsection

@section('script')

<script>
    var page = 1;
    var ENDPOINT = "/whitelist?";

    // jika tombol loadmore diklik
    $("#loadmore").click(function() {
        page++;
        loadMoreData(page);
    });

    function loadMoreData(page) {
        $.ajax({
                url: ENDPOINT + '&page=' + page // Perhatikan penggunaan "&" sebagai pemisah parameter.
                , type: "get"
                , beforeSend: function() {
                    $('.ajax-load').show();
                    $('#loadmore').hide();
                }
            })
            .done(function(data) {
                if (data.html == "") {
                    $('#loadmore').hide();
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $('#loadmore').show();
                $("#test").append('<div class="row">' + data.html + '</div>');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                // alert('server not responding...');
            });
    }

</script>
@endsection
