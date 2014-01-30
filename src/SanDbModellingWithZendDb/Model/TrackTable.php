<?php

namespace SanDbModellingWithZendDb\Model;

use Zend\Db\TableGateway\TableGateway;

class TrackTable
{
    protected $tableGateway;

   public $table = 'track'; // add this

    //set table gateway via setter
    public function setTableGateway(TableGateway $tableGateway) //set table gateway via setter
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getTableGateway()
    {
    return $this->tableGateway;
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

    public function saveAlbum(Track $track)
    {
        $data = array(
                'title'  => $track->title,
             'album_id' => $track->album_id,
         );
    
        $id = (int) $album->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Track id does not exist');
            }
        }
    }

    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }

}
