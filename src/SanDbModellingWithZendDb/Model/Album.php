<?php

namespace SanDbModellingWithZendDb\Model;

class Album
{
    public $id;
    public $artist;
    public $title;

    protected $tracks;

    public function setTracks($tracks)
    {
        $this->tracks = $tracks;
    }

    public function getTracks()
    {
        return $this->tracks;
    }
}
