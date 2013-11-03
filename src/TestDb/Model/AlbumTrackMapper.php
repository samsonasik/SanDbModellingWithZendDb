<?php

namespace TestDb\Model;

class AlbumTrackMapper
{
    protected $album;
    protected $track;

    public function __construct(AlbumTable $album, TrackTable $track)
    {
        $this->album = $album;
        $this->track = $track;
    }

    public function findAll()
    {
        $albums = $this->album->getTableGateway()->select();
        $albums->buffer();

        foreach ($albums as $album) {
            $trackrows = $this->track->getTableGateway()->select(array('album_id' => $album->id));
            $album->setTracks(iterator_to_array($trackrows));
        }

        return $albums;
    }
}
