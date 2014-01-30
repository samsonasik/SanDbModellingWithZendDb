<?php

namespace SanDbModellingWithZendDb\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SanDbModellingWithZendDbControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $controller = new \SanDbModellingWithZendDb\Controller\SanDbModellingWithZendDbController($serviceLocator->getServiceLocator()->get('AlbumTrackMapper'));

        return $controller;
    }
}

