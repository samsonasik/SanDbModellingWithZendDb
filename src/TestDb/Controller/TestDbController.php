<?php

namespace TestDb\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class TestDbController extends AbstractActionController
{
    public function indexAction()
    {
        echo "<h2>Fetch Album Rows :</h2> <br />";
        \Zend\Debug\Debug::dump($this->getServiceLocator()->get('TestDb\Model\AlbumTable')->fetchAll()->toArray());

        echo "<h2>Fetch Track Rows :</h2> <br />";
        \Zend\Debug\Debug::dump($this->getServiceLocator()->get('TestDb\Model\TrackTable')->fetchAll()->toArray());

        echo "<h2>Joined Track & Album Tables :</h2> <br />";
        $albums = $this->getServiceLocator()->get('AlbumTrackMapper')->findAll();
        \Zend\Debug\Debug::dump($albums);

        echo '<ul>';
        foreach ($albums as $album) {
            echo  '<li>';

            echo $album->artist ;
            echo '<ul>';
                foreach ($album->getTracks() as $i => $track) {
                    echo '<li>' . ($i+1) . ': ' .  $track->title  . '</li>';
                }
            echo '</ul>';

            echo '</li>';
        }
        echo '</ul>';

    }
}
