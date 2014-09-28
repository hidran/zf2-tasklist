<?php
namespace Tasklist\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\ResultSet\HydratingResultSet;

/**
 *
 * @author hidran
 *        
 */
class TaskMapper
{

    protected $tableName = 'task_item';

    protected $dbAdapter;

    protected $sql;

    /**
     */
    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function fetchAll()
    {
        $select = $this->sql->select();
       // $select->where(array('completed' => '4'));
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        $entityProtoType = new TaskEntity();
        $hidrator = new ClassMethods();
        $resulSet = new HydratingResultSet($hidrator, $entityProtoType);
        $resulSet->initialize($results);
        return $resulSet;
    }
}

