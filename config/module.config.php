<?php

namespace SanDbModellingWithZendDb;

use SanDbModellingWithZendDb\Controller\SanDbModellingWithZendDbController;

return array(

    'controllers' => array(
        'factories' => array(
            'SanDbModellingWithZendDb\Controller\SanDbModellingWithZendDb' => function($controller) {
                $controller = new SanDbModellingWithZendDbController($controller->getServiceLocator()->get('AlbumTrackMapper'));

                return $controller;
            },
        ),
    ),

    'service_manager' => array(
        'abstract_factories' => array(
            'SanDbModellingWithZendDb\Factory\Model\TableModelAbstractFactory'
        ),
        'factories' => array(
            'AlbumTrackMapper' => function($sm) {
                $mapper = new Model\AlbumTrackMapper($sm->get('SanDbModellingWithZendDb\Model\AlbumTable'),
                                                     $sm->get('SanDbModellingWithZendDb\Model\TrackTable'));

                return $mapper;
            },
        ),
    ),

    'router' => array(
        'routes' => array(
            'testdb' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/zenddbmodelling[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'SanDbModellingWithZendDb\Controller\SanDbModellingWithZendDb',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'sandbmodellingwithzenddb' => __DIR__ . '/../view',
        ),
    ),
);
