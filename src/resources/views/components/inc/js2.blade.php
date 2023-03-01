<script>
    $('body').on('click', '.badge', function () {
        $(this).closest('li').remove();
        spCountFiles({{ $uniqueId }});
    });

    $(document).ready(function () {
        MediaInput.initializeAll('{{ $uniqueId }}');
    });
</script>
