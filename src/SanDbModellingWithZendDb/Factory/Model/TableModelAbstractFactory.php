<?php

namespace SanDbModellingWithZendDb\Factory\Model;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;

class TableModelAbstractFactory implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        return (bool) ((substr($requestedName, -5) === 'Table') && class_exists($requestedName));
    }

    public function createServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        $table = new $requestedName();

        $dbAdapter = $locator->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new HydratingResultSet();

        $class = '\\'.substr($requestedName, 0, -5);

        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new $class());
        $tableGateway =  new TableGateway($table->table, $dbAdapter, null, $resultSetPrototype);

        $table->setTableGateway($tableGateway);

        return $table;
    }
}
