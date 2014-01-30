<?php

namespace SanDbModellingWithZendDb;

use SanDbModellingWithZendDb\Controller\SanDbModellingWithZendDbController;

return array(

    'controllers' => array(
        'factories' => array(
            'SanDbModellingWithZendDb\Controller\SanDbModellingWithZendDb' => 'SanDbModellingWithZendDb\Factory\Controller\SanDbModellingWithZendDbControllerFactory',
        ),
    ),

    'service_manager' => array(
        'abstract_factories' => array(
            'SanDbModellingWithZendDb\Factory\Model\TableModelAbstractFactory'
        ),
        'factories' => array(
            'AlbumTrackMapper' => 'SanDbModellingWithZendDb\Factory\Model\AlbumTrackMapperFactory',
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
