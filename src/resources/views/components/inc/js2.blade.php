<script>
    $('body').on('click', '.badge', function () {
        $(this).closest('li').remove();
        spCountFiles({{ $uniqueId }});
    });

    var MediaInput = {
        initializeSortable: function () {
            if (typeof Sortable == 'function') {
                var el = document.getElementById('spUploadShow{{ $uniqueId }}');
                if (el) {
                    Sortable.create(el, {
                        group: "words",
                        animation: 150,
                        onUpdate: function () {
                            $("#spUploadShow{{ $uniqueId }} li").removeClass("width-big");
                            $("#spUploadShow{{ $uniqueId }} li").first().addClass("width-big");
                        },
                    });
                }
            }
        },
        initializeMagnificPopup: function () {
            if ($.isFunction($.fn.magnificPopup)) {
                var el = $('#spUploadShow{{ $uniqueId }}');
                if (el) {
                    el.magnificPopup({
                        delegate: 'a',
                        type: 'image'
                    });
                }
            }
        },
        initializeAll: function () {
            this.initializeSortable();
            this.initializeMagnificPopup();
        },
    };

    $(document).ready(function () {
        MediaInput.initializeAll();
    });
</script>
