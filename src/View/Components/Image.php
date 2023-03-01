<?php

namespace Sudip\MediaInput\View\Components;

use Illuminate\View\Component;

class Image extends Component
{
    public $uniqueId;
    public $inputName;
    public $itemKey;
    public $itemValue;
    public $items;
    public $fileUrls;
    public $hasFiles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($uniqueId = 'image', $name = 'image', $itemKey = 'id', $itemValue = 'image_url', $items = null, $fileUrls = [])
    {
        $this->uniqueId = $uniqueId;
        $this->inputName = $name;
        $this->itemKey = $itemKey;
        $this->itemValue = $itemValue;
        $this->items = $items;
        $this->fileUrls = is_array($fileUrls) ? $fileUrls : [];
        $this->hasFiles = !(empty($this->fileUrls) && empty($this->items));
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
