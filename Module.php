<?php

namespace ColumnMaker;

use Omeka\Module\AbstractModule;
use Zend\EventManager\Event;
use Zend\EventManager\SharedEventManagerInterface;
use Zend\Mvc\MvcEvent;

class Module extends AbstractModule
{
    /** Module body **/
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}