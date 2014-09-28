<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Tasklist for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Tasklist;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Tasklist\Model\TaskMapper;



class Module implements AutoloaderProviderInterface
{
  public function getAutoloaderConfig()
    {
       
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

   public function getServiceConfig()
   {
       return array(
           'factories' => array(
               'Tasklist\Model\TaskMapper' => function ($sm){
                 
                   $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                   $taskMapper = new TaskMapper($adapter);
         
                   return $taskMapper;
               }
           ),
       );
   }
}
