<?php

namespace TestDb\Model;

use Zend\Db\TableGateway\TableGateway;

class AlbumTable
{
    protected $tableGateway;
    public $table = 'album'; // add this

    //set table gateway via setter
    public function setTableGateway(TableGateway $tableGateway) //set table gateway via setter
    {
        $this->tableGateway = $tableGateway;
    }

    public function getTableGateway()
    {
    return $this->tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getAlbum($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }

        return $row;
    }

    public function saveAlbum(Album $album)
    {
    $data = array(
             'artist' => $album->artist,
             'title'  => $album->title,
         );

    $id = (int) $album->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Album id does not exist');
            }
        }
    }

    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }

}
