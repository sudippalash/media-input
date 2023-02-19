<script>
    $('#spUploadImage').click(function (e) {
        e.preventDefault();
        $('#inputImage input').click();
    });

    function spAddImage(id, inputName) {
        var url = $(`#sp_get_image_url${id}`).val();
        $('#spImageUrlErrorMsg').hide();

        if (spCheckURL(url)) {
            $(`#spUploadShow${id}`).append(`<li class="box">
                <span class="badge">x</span>
                <a href="${url}"><img src="${url}" /></a>
                <input type="hidden" name="${inputName}[]" value="${url}">
            </li>`);
            
            $('#'+id).val('');
            $('#spImageModal').modal('hide');
            
            spCountFiles(id);
        } else {
            $('#spImageUrlErrorMsg').show();
        }
    }

    function spAddVideo(id, inputName) {
        var url = $(`#sp_get_video_url${id}`).val();
        $('#spVideoUrlErrorMsg').hide();

        if (spValidYoytube(url)) {
            var video_id = url.split('v=')[1];
            var ampersandPosition = video_id.indexOf('&');
            if (ampersandPosition != -1) {
                video_id = video_id.substring(0, ampersandPosition);
            }

            $(`#spUploadShow${id}`).append(`<li class="box">
                <span class="badge">x</span>
                <a href="${url}" class="mfp-iframe"><img src="https://img.youtube.com/vi/${video_id}/sddefault.jpg"></a>
                <input type="hidden" name="${inputName}[]" value="${url}">
            </li>`);

            $('#'+id).val('');
            $('#spVideoModal').modal('hide');

            spCountFiles(id);
        } else {
            $('#spVideoUrlErrorMsg').show();
        }
    }

    function spCheckURL(url) {
        return(url.match(/\.(jpeg|jpg|gif|png|webp)$/) != null);
    }

    function spValidYoytube(url) {
        var p = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
        return (url.match(p)) ? RegExp.$1 : false;
    }

    function spReadURL(input, id, inputName) {
        for (let index = 0; index < input.files.length; index++) {
            if (input.files && input.files[index]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(`#spUploadShow${id}`).append(`<li class="box">
                        <span class="badge">x</span>
                        <a href="${e.target.result}"><img src="${e.target.result}" /></a>
                        <input type="hidden" name="${inputName}[]" value="${e.target.result}">
                    </li>`);
                    
                    spCountFiles(id);
                };
                reader.readAsDataURL(input.files[index]);
            }
        }
    }

    function spCountFiles(id) {
        var counts = $(`ul[id='spUploadShow${id}'] li`).length;
        if (counts > 0) {
            $(`#spUploadButton${id}`).removeClass("sp-upload-button").addClass("sp-upload-button2");
        } else {
            $(`#spUploadButton${id}`).removeClass("sp-upload-button2").addClass("sp-upload-button");
        }

        $(`#spUploadShow${id} li`).first().addClass("width-big");
    }
</script>