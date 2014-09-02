<?php

trait AttachmentTrait
{
    protected $extImages = [ 'jpg', 'png', 'gif', 'bmp', 'svg' ];
    protected $extFiles = [
        'pdf' => 'fa-file-pdf-o',

        'odt' => 'fa-file-word-o',
        'doc' => 'fa-file-word-o',
        'docx' => 'fa-file-word-o',

        'xls' => 'fa-file-excel-o',
        'xlsx' => 'fa-file-excel-o',
        'csv' => 'fa-file-excel-o',

        'zip' => 'fa-file-zip-o',
        'tar' => 'fa-file-zip-o',
        'gz' => 'fa-file-zip-o',
        'rar' => 'fa-file-zip-o',

        'mp3' => 'fa-file-audio-o',

        'ppt' => 'fa-file-powerpoint-o',
        'pptx' => 'fa-file-powerpoint-o',
        'pps' => 'fa-file-powerpoint-o',
        'ppsx' => 'fa-file-powerpoint-o',
    ];

    public function show()
    {
        $ext = isset($this->extFiles[ $this->ext() ]) ? $this->extFiles[ $this->ext() ] : false;

        if ($this->is_image()) {
            return '<div class="image thumbnail">' . HTML::image($this->path(), null, [ 'class' => 'img-responsive' ]) . '</div>';
        }
        else {
            $class_name =  $ext ? $this->extFiles[ $this->ext() ] : 'fa-file';
            return '<div class="file thumbnail"><i class="fa ' . $class_name . ' fa-5x"></i></div>';
        }
    }

    public function download()
    {
        $target = $this->is_image() ? ' target="blank"' : null;
        return '<a href="' . url($this->path()) . '"' . $target . ' class="btn btn-xs btn-info"><i class="fa fa-download"></i></a>';
    }

    public function unique_name()
    {
        return strtolower(Str::random(8) . '-' . Str::random(4) . '-' . Str::random(4) . '-' . Str::random(4) . '-' . Str::random(12));
    }

    public function path()
    {
        return 'uploads/' . str_plural($this->parent_name) . '/' . $this->parent_id . '/' . $this->file_name;
    }

    public function is_main()
    {
        return $this->is_main;
    }

    protected function is_image()
    {
        return in_array($this->ext(), $this->extImages);
    }

    protected function ext()
    {
        $path = explode('.', $this->path());
        return end($path);
    }
}
