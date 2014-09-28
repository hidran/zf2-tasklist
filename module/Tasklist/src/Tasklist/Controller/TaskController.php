<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Tasklist for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Tasklist\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasklist\Form\TaskForm;
use Tasklist\Model\TaskEntity;

class TaskController extends AbstractActionController
{
    public function indexAction()
    {
        $mapper = $this->getTaskMapper();
        $tot =  $mapper->fetchAll();
       
      $tasks = $mapper->fetchAll();
      
     return new ViewModel(array('tasks' => $mapper->fetchAll()));
     
    }

    public function addAction()
    {
       $form = new TaskForm();       
       $task = new TaskEntity();
       $form->bind($task);
       if($this->getRequest()->isPost()){
           $form->setData($this->getRequest()->getPost());
           if($form->isValid()){
               $this->getTaskMapper()->saveTask($task);
               return $this->redirect()->toRoute('task');
           }
           
       }
        return array('form' => $form);
    }
    public function getTaskMapper()
    {
        $sl = $this->getServiceLocator();
        return $sl->get('Tasklist\Model\TaskMapper');
    
    }
}
