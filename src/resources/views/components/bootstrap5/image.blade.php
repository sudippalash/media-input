@once
    @push(config('media-input.styles_stack'))
        @include('media-input::components.inc.css')
    @endpush
@endonce

<div class="card">
    <div class="card-header">
        {{ trans('media-input::media_input.upload_title') }}
        <div class="dropdown float-end">
            <a href="javascript:void(0);" class="dropdown-toggle" id="spDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                {{ trans('media-input::media_input.add_media_from_url') }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="spDropdown">
                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#spImageModal{{ $uniqueId }}">
                    {{ trans('media-input::media_input.image_from_url') }}
                </a>
                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#spVideoModal{{ $uniqueId }}">
                    {{ trans('media-input::media_input.video_from_url') }}
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="sp-upload-box">
            <ul class="sp-upload-show" id="spUploadShow{{ $uniqueId }}">
            @if (!empty($fileUrls))
                @foreach ($fileUrls as $url)
                <li class="box">
                    <span class="badge bg-secondary">x</span>
                    <a href="{{ $url }}"><img src="{{ $url }}" /></a>
                    <input type="hidden" name="{{ $inputName }}[]" value="{{ $url }}">
                </li>
                @endforeach
            @endif
            </ul>
            <div id="spUploadButton{{ $uniqueId }}" class="sp-upload-button{{ !empty($fileUrls) ? '2' : '' }}">
                <span class="middle">
                    <span class="badge bg-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 8l-5-5-5 5M12 4.2v10.3"/>
                        </svg>
                    </span>
                    <br>
                    <button class="btn btn-secondary" id="spUploadImage" style="font-size: .8rem;">{{ trans('media-input::media_input.add_drop_file') }}</button>
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
                <h5 class="modal-title">{{ trans('media-input::media_input.image_from_url') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('media-input::media_input.cancel') }}</button>
                <button type="button" class="btn btn-secondary" onclick="spAddImage('{{ $uniqueId }}', '{{ $inputName }}')">{{ trans('media-input::media_input.add_media') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="spVideoModal{{ $uniqueId }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('media-input::media_input.video_from_url') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('media-input::media_input.cancel') }}</button>
                <button type="button" class="btn btn-secondary" onclick="spAddVideo('{{ $uniqueId }}', '{{ $inputName }}')">{{ trans('media-input::media_input.add_media') }}</button>
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