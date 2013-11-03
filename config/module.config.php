<?php

namespace TestDb;

return array(

    'controllers' => array(
        'invokables' => array(
            'TestDb\Controller\TestDb' => 'TestDb\Controller\TestDbController',
        ),
    ),

    'service_manager' => array(
        'abstract_factories' => array(
            'TestDb\Factory\Model\TableModelAbstractFactory'
        ),
        'factories' => array(
            'AlbumTrackMapper' => function($sm) {
                $mapper = new Model\AlbumTrackMapper($sm->get('TestDb\Model\AlbumTable'),
                                                     $sm->get('TestDb\Model\TrackTable'));

                return $mapper;
            },
        ),
    ),

    'router' => array(
        'routes' => array(
            'testdb' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/testdb[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'TestDb\Controller\TestDb',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'testdb' => __DIR__ . '/../view',
        ),
    ),
);
