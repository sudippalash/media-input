<script>
    $('body').on('click', '.badge', function () {
        $(this).closest('li').remove();
        spCountFiles({{ $uniqueId }});
    });

    $(function () {
        if ( typeof Sortable == 'function' ) { 
            var el = document.getElementById('spUploadShow{{ $uniqueId }}');
            Sortable.create(el, {
                group: "words",
                animation: 150,
                onUpdate: function () {
                    $("#spUploadShow{{ $uniqueId }} li").removeClass("width-big");
                    $("#spUploadShow{{ $uniqueId }} li").first().addClass("width-big");
                },
            });
        }

        if ( $.isFunction($.fn.magnificPopup) ) {
            $('#spUploadShow{{ $uniqueId }}').magnificPopup({
                delegate: 'a',
                type: 'image'
            });
        }
    });
</script>