@once
    @push(config('media-input.styles_stack'))
        @include('media-input::components.inc.css')
    @endpush
@endonce

<div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('media-input::media_input.upload_title') }}
        <div class="dropdown pull-right">
            <a href="javascript:void(0);" id="spDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                {{ trans('media-input::media_input.add_media_from_url') }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="spDropdown">
                <li>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#spImageModal{{ $uniqueId }}">
                        {{ trans('media-input::media_input.image_from_url') }}
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#spVideoModal{{ $uniqueId }}">
                        {{ trans('media-input::media_input.video_from_url') }}
                    </a>
                </li>
            </ul>
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

<div class="modal fade" id="spImageModal{{ $uniqueId }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">{{ trans('media-input::media_input.image_from_url') }}</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="sp_get_image_url{{ $uniqueId }}">{{ trans('media-input::media_input.image_from_url_label') }}</label>
                    <input type="text" class="form-control" placeholder="https://" id="sp_get_image_url{{ $uniqueId }}">
                    <span class="text-danger" id="spImageUrlErrorMsg" style="display: none;">
                        {{ trans('media-input::media_input.image_from_url_err') }}
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('media-input::media_input.cancel') }}</button>
                <button type="button" class="btn btn-default" onclick="spAddImage('{{ $uniqueId }}', '{{ $inputName }}')">{{ trans('media-input::media_input.add_media') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="spVideoModal{{ $uniqueId }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">{{ trans('media-input::media_input.video_from_url') }}</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="sp_get_video_url{{ $uniqueId }}">{{ trans('media-input::media_input.video_from_url_label') }}</label>
                    <input type="text" class="form-control" placeholder="https://" id="sp_get_video_url{{ $uniqueId }}">
                    <span class="text-danger" id="spVideoUrlErrorMsg" style="display: none;">
                        {{ trans('media-input::media_input.video_from_url_err') }}
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('media-input::media_input.cancel') }}</button>
                <button type="button" class="btn btn-default" onclick="spAddVideo('{{ $uniqueId }}', '{{ $inputName }}')">{{ trans('media-input::media_input.add_media') }}</button>
            </div>
        </div>
    </div>
</div>

@once
    @push(config('media-input.scripts_stack'))
        @include('media-input::components.inc.js')
    @endpush
@endonce

@push(config('media-input.scripts_stack'))
    @include('media-input::components.inc.js2')
@endpush