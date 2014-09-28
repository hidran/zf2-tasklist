<?php
namespace Tasklist\Form;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class TaskForm extends Form
{

    function __construct($name = null, $options = array())
    {
        parent::__construct('Task');
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new TaskFilter());
        $this->setHydrator(new ClassMethods());
        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));
        
        $this->add(array(
            'name' => 'title',
            'type' => 'text',
            'options' => array(
             'label' => 'Title'
            ),
            'attributes' => array(
                'id' => 'title',
                'maxlength' => 100
            )
        ));
        
        $this->add(array(
            'name' => 'title',
            'type' => 'checkbox',
            'options' => array(
                'label' => 'Completed?',
                'label_attrinutes' => array('class' =>'checkbox') ,
            )
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'class' => 'btn btn-primary',
                'value' => 'Go',
                'label_attrinutes' => array('class' =>'checkbox') ,
            )
        ));
        
    }
}

?>