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

    public function unique_name()
    {
        return strtolower(Str::random(8) . '-' . Str::random(4) . '-' . Str::random(4) . '-' . Str::random(4) . '-' . Str::random(12));
    }

    public function download_button()
    {
        $target = $this->is_image() ? ' target="blank"' : null;
        return '<a href="' . url($this->path()) . '"' . $target . ' class="btn btn-xs btn-info"><i class="fa fa-download"></i></a>';
    }

    public function comment_button()
    {
        return '<a href="' . $this->comment_path() . '" class="btn btn-xs btn-warning"><i class="fa fa-comments"></i></a>';
    }

    public function parent_button($parent_route = false)
    {
        if ($parent_route) {
            return '<a href="' . $this->parent_path($parent_route) . '" class="btn btn-xs btn-primary"><i class="fa fa-arrow-left"></i></a>';
        }
    }

    public function path()
    {
        return 'uploads/' . str_plural($this->parent_name) . '/' . $this->parent_id . '/' . $this->file_name;
    }

    public function parent_path($parent_route = false)
    {
        $parent_route = $parent_route ? $parent_route : 'admin.' . str_plural($this->parent_name) . '.edit';
        return route($parent_route, $this->parent_id);
    }

    public function comment_path()
    {
        return route('attachments.show', [ str_plural($this->parent_name), $this->parent_id, $this->id ]);
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
