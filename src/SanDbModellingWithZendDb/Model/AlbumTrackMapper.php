<?php

namespace SanDbModellingWithZendDb\Model;
use Zend\Db\Sql;

class AlbumTrackMapper
{
    protected $album;
    protected $track;

    public function __construct(AlbumTable $album, TrackTable $track)
    {
        $this->album = $album;
        $this->track = $track;
    }
    
    public function getAlbum()
    {
        return $this->album;
    }
    
    public function getTrack()
    {
        return $this->track;
    }

    /**
       represent :
          "like" :  SELECT *
       FROM album a
       LEFT JOIN track b ON a.id = b.album_id
    */
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

    /**
     * create function represent
     * "like" : select * from album a inner join track b on a.id = b.album_id
     */
    public function findAllOnlyMatch()
    {
        $subselect = $this->track->getTableGateway()->getSql()->select();
        $subselect->columns(array('album_id'));

        $select = $this->album->getTableGateway()->getSql()->select();
        $select->where->equalTo(
            'id',    new Sql\Expression('any('.$subselect->getSqlString($this->track->getTableGateway()->getAdapter()->getPlatform()).')')
        );

        $albums = $this->album->getTableGateway()->selectWith($select);
        $albums->buffer();

        foreach ($albums as $album) {
            $trackrows = $this->track->getTableGateway()->select(array('album_id' => $album->id));
            $album->setTracks(iterator_to_array($trackrows));
        }

        return $albums;
    }
}
