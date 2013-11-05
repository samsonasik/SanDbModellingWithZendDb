<?php

namespace SanDbModellingWithZendDb\Model;

class Album
{
    public $id;
    public $artist;
    public $title;

    protected $tracks;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id']))     ? $data['id']     : null;
        $this->artist = (isset($data['artist'])) ? $data['artist'] : null;
        $this->title  = (isset($data['title']))  ? $data['title']  : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function setTracks($tracks)
    {
        $this->tracks = $tracks;
    }

    public function getTracks()
    {
        return $this->tracks;
    }
}
