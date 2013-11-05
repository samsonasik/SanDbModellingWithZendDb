<?php

namespace SanDbModellingWithZendDb\Model;

class Track
{
    public $id;
    public $title;
    public $album_id;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id']))     ? $data['id']     : null;
        $this->title  = (isset($data['title']))  ? $data['title']  : null;
        $this->album_id = (isset($data['album_id'])) ? $data['album_id'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
