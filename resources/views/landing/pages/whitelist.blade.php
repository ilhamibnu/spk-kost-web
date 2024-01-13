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
    </div>
</section>
@endsection

@section('script')

<script>
    var page = 1;
    var ENDPOINT = "/whitelist?";

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        $.ajax({
                url: ENDPOINT + '&page=' + page // Perhatikan penggunaan "&" sebagai pemisah parameter.
                , type: "get"
                , beforeSend: function() {
                    $('.ajax-load').show();
                }
            })
            .done(function(data) {
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#test").append('<div class="row">' + data.html + '</div>');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }

</script>
@endsection
