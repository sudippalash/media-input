@once
    @push(config('media-input.styles_stack'))
        @include('media-input::components.inc.css')

        <style>
            .panel-default {
                border-color: #ddd;
            }
            .panel {
                margin-bottom: 20px;
                background-color: #fff;
                border: 1px solid transparent;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
                box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
            }
            
            .panel-default>.panel-heading {
                color: #333;
                background-color: #f5f5f5;
                border-color: #ddd;
            }
            .panel-heading {
                padding: 10px 15px;
                border-bottom: 1px solid transparent;
                border-top-left-radius: 3px;
                border-top-right-radius: 3px;
            }
            .pull-right {
                float: right!important;
            }
            .text-danger {
                color: #a94442;
            }
            .btn {
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -ms-touch-action: manipulation;
                touch-action: manipulation;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
            }
            .btn-default {
                color: #333;
                background-color: #fff;
                border-color: #ccc;
            }
        </style>
    @endpush
@endonce

<div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('media-input::media_input.upload_title') }}
        <div class="pull-right">
            <a href="javascript:void(0);" onclick="imageUrl('{{ $uniqueId }}', '{{ $inputName }}')">
                {{ trans('media-input::media_input.image_from_url') }}
            </a>
            &nbsp;|&nbsp;
            <a href="javascript:void(0);" onclick="videoUrl('{{ $uniqueId }}', '{{ $inputName }}')">
                {{ trans('media-input::media_input.video_from_url') }}
            </a>
        </div>
    </div>

    <div class="panel-body">
        <div class="sp-upload-box">
            <ul class="sp-upload-show" id="spUploadShow{{ $uniqueId }}">
            @if (!empty($fileUrls))
                @foreach ($fileUrls as $url)
                <li class="box">
                    <span class="badge">x</span>
                    <a href="{{ $url }}"><img src="{{ $url }}" /></a>
                    <input type="hidden" name="{{ $inputName }}[]" value="{{ $url }}">
                </li>
                @endforeach
            @endif
            </ul>
            <div id="spUploadButton{{ $uniqueId }}" class="sp-upload-button{{ !empty($fileUrls) ? '2' : '' }}">
                <span class="middle">
                    <span class="badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 8l-5-5-5 5M12 4.2v10.3"/>
                        </svg>
                    </span>
                    <br>
                    <button class="btn btn-default" id="spUploadImage">{{ trans('media-input::media_input.add_drop_file') }}</button>
                    <span id="inputImage">
                        <input type="file" onchange="spReadURL(this, '{{ $uniqueId }}', '{{ $inputName }}')" accept="image/*" multiple>
                    </span>
                </span>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="sp_get_image_url{{ $uniqueId }}" />
<span class="text-danger" id="spImageUrlErrorMsg{{ $uniqueId }}" style="display: none;">
    {{ trans('media-input::media_input.image_from_url_err') }}
</span>

<input type="hidden" id="sp_get_video_url{{ $uniqueId }}" />
<span class="text-danger" id="spVideoUrlErrorMsg{{ $uniqueId }}" style="display: none;">
    {{ trans('media-input::media_input.video_from_url_err') }}
</span>

@once
    @push(config('media-input.scripts_stack'))
        @include('media-input::components.inc.js')
        <script>
            function imageUrl(uniqueId, inputName) {
                let url = prompt("{{ trans('media-input::media_input.image_from_url_label') }}", "");
                if (url != null) {
                    $(`#sp_get_image_url${uniqueId}`).val(url);
                    spAddImage(uniqueId, inputName);
                } else {
                    $(`#sp_get_image_url${uniqueId}`).val('');
                    $(`#spImageUrlErrorMsg${uniqueId}`).hide();
                }
            }
            function videoUrl(uniqueId, inputName) {
                let url = prompt("{{ trans('media-input::media_input.video_from_url_label') }}", "");
                if (url != null) {
                    $(`#sp_get_video_url${uniqueId}`).val(url);
                    spAddVideo(uniqueId, inputName);
                } else {
                    $(`#sp_get_video_url${uniqueId}`).val('');
                    $(`#spVideoUrlErrorMsg${uniqueId}`).hide();
                }
            }
        </script>
    @endpush
@endonce

@push(config('media-input.scripts_stack'))
    @include('media-input::components.inc.js2')
@endpush