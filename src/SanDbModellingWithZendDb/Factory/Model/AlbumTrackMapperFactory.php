<?php

namespace SanDbModellingWithZendDb\Factory\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AlbumTrackMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new \SanDbModellingWithZendDb\Model\AlbumTrackMapper($serviceLocator->get('SanDbModellingWithZendDb\Model\AlbumTable'),
                                                     $serviceLocator->get('SanDbModellingWithZendDb\Model\TrackTable'));

        return $mapper;
    }
}

