    </div>

{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

<script src="{!! asset('assets/js/jquery-3.3.1.min.js')  !!}"></script>
<script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

<script>
    $(function () {
        $(".heading-compose").click(function () {
            $(".side-two").css({
                "left": "0"
            });
        });

        $(".newMessage-back").click(function () {
            $(".side-two").css({
                "left": "-100%"
            });
        });


    });
</script>

</body>
</html>