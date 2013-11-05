<?php

namespace SanDbModellingWithZendDb\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use SanDbModellingWithZendDb\Model\AlbumTrackMapper;
use Zend\View\Model\ViewModel;

class SanDbModellingWithZendDbController extends AbstractActionController
{
    protected $mapper;
    
    public function __construct(AlbumTrackMapper $mapper)
    {
        $this->mapper = $mapper;    
    }
    
    public function indexAction()
    {
        return new ViewModel(array(
            'fetchalbumrows' => $this->mapper->getAlbum()->fetchAll()->toArray(),
            'fetchtrackrows' => $this->mapper->getTrack()->fetchAll()->toArray(),
            'findtwotablesAll' => $this->mapper->findAll(),
            'findtwotablesonlyForMatch' => $this->mapper->findAllOnlyMatch()
        )); 
    }
}
