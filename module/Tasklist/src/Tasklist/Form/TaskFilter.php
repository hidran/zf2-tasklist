<?php
namespace Tasklist\Form;

use Zend\InputFilter\InputFilter;

class TaskFilter extends InputFilter
{

    function __construct()
    {
        $this->add(array(
            'name' => 'id',
            'required' => true,
            'filters' => array(
                array('name' => 'Int'),
            ),
        ));
        
        $this->add(array(
            'name' => 'title',
            required => true,
            filters => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                
            ),
            'validators' => array(
                array(
                    'name' => 'MaxLength',
                    'options'=> array(
                        'encoding' => 'UTF-8',
                        'max' => 100
                    
                    ),
                )
            
            )
        ));
        
        $this->add(array(
             'name' => 'completed',
             'required' => false,
         ));
    }
}

?>