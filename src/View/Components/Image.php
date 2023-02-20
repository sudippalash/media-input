<?php

namespace Sudip\MediaInput\View\Components;

use Illuminate\View\Component;

class Image extends Component
{
    public $uniqueId;
    public $inputName;
    public $fileUrls;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($uniqueId = 'image', $name = 'image', $fileUrls = [])
    {
        $this->uniqueId = $uniqueId;
        $this->inputName = $name;
        $this->fileUrls = is_array($fileUrls) ? $fileUrls : [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $platform = config('media-input.platform');
        if (!in_array($platform, ['bootstrap3', 'bootstrap4', 'bootstrap5', 'default'])) {
            $platform = 'default';
        }
        return view('media-input::components.' . $platform . '.image');
    }
}
