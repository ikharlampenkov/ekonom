<?php

/**
 * class TM_Task_Task
 *
 */
class TM_Task_Task
{

    const TASK_TYPE_PERIOD = 1;

    /** Aggregations: */

    /** Compositions: */

    /*** Attributes: ***/

    /**
     *
     * @access protected
     */
    protected $_id;

    /**
     *
     * @access protected
     */
    protected $_title;

    /**
     * @var TM_User_User
     * @access protected
     */
    protected $_user = null;

    /**
     *
     * @access protected
     */
    protected $_dateCreate;

    /**
     * @var int
     */
    protected $_type = 1;

    /**
     * @var array - список возможный значений для типа задачи
     */
    protected $_typeList = array(1 => 'Период', 2 => 'Без учета времени', 3 => 'На дату');

    /**
     *
     * @access protected
     */
    protected $_childTask = array();

    /**
     *
     * @access protected
     */
    protected $_parentTask = array();

    /**
     * @var array
     */
    protected $_attributeList = array();

    /**
     *
     * @var StdLib_DB
     * @access protected
     */
    protected $_db;


    /**
     *
     *
     * @return int
     * @access public
     */
    public function getId()
    {
        return $this->_id;
    } // end of member function getId

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getTitle()
    {
        return $this->_db->prepareStringToOut($this->_title);
    } // end of member function getTitle

    /**
     *
     *
     * @return User::TM_User_User
     * @access public
     */
    public function getUser()
    {
        return $this->_user;
    } // end of member function getUser

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getDateCreate()
    {
        return $this->_dateCreate;
    } // end of member function getDateCreate

    /**
     *
     *
     * @param int $value
     * @return void
     * @access protected
     */
    protected function setId($value)
    {
        $this->_id = (int)$value;
    } // end of member function setId

    /**
     *
     *
     * @param string $value
     * @return void
     * @access public
     */
    public function setTitle($value)
    {
        $this->_title = $this->_db->prepareString($value);
    } // end of member function setTitle

    /**
     *
     *
     * @param TM_User_User $value
     * @return void
     * @access public
     */
    public function setUser(TM_User_User $value)
    {
        $this->_user = $value;
    } // end of member function setUser

    /**
     *
     *
     * @param string $value
     * @return string
     * @access public
     */
    public function setDateCreate($value)
    {
        $value = $this->_db->prepareString($value);
        $this->_dateCreate = date("Y-m-d H:i:s", strtotime($value));
    } // end of member function setDateCreate

    /**
     * @param int $type
     */
    public function setType($type)
    {
        if (key_exists($type, $this->_typeList)) {
            $this->_type = $type;
        } else {
            $this->_type = 1;
        }

    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @return array
     */
    public function getTypeList()
    {
        return $this->_typeList;
    }

    public function __get($name)
    {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    /**
     *
     *
     * @return TM_Task_Task
     * @access public
     */
    public function __construct()
    {
        $this->_db = StdLib_DB::getInstance();
    } // end of member function __construct

    /**
     *
     *
     * @return void
     * @access public
     */
    public function insertToDb()
    {
        try {
            $sql = 'INSERT INTO tm_task(title, user_id, date_create, type)
                    VALUES ("' . $this->_title . '", ' . $this->_user->getId() . ',
                            "' . $this->_dateCreate . '", ' . $this->_type . ')';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();
            $this->saveParent();
            //$this->saveChild();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function insertToDb

    /**
     *
     *
     * @return void
     * @access public
     */
    public function updateToDb()
    {
        try {
            $sql = 'UPDATE tm_task 
                    SET title="' . $this->_title . '", user_id="' . $this->_user->getId() . '",
                        date_create="' . $this->_dateCreate . '", type=' . $this->_type . '
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);

            $this->saveParent();
            $this->saveAttributeList();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function updateToDb

    /**
     *
     *
     * @return void
     * @access public
     */
    public function deleteFromDb()
    {
        try {
            $this->deleteAllParent();
            $this->saveParent();

            $sql = 'DELETE FROM tm_task
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function deleteFromDb

    /**
     *
     *
     * @param int $id идентификатор задачи
     * @return TM_Task_Task
     * @static
     * @access public
     */
    public static function getInstanceById($id)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM tm_task WHERE id=' . (int)$id;
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new TM_Task_Task();
                $o->fillFromArray($result[0]);
                return $o;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getInstanceById

    /**
     *
     *
     * @param $user
     * @param array $values
     * @return TM_Task_Task
     * @static
     * @access public
     */
    public static function getInstanceByArray($user, $values)
    {
        try {
            $o = new TM_Task_Task();
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getInstanceByArray

    /**
     *
     *
     * @param TM_User_User $user
     * @param int $parentId
     * @return array
     * @static
     * @access public
     */
    public static function getAllInstance(TM_User_User $user, $parentId = 0)
    {
        try {
            $db = StdLib_DB::getInstance();

            if ($parentId > 0) {
                $sql = 'SELECT * FROM tm_task, tm_task_relation
                        WHERE id=child_id AND parent_id=' . (int)$parentId;
            } elseif ($parentId === -1) {
                $sql = 'SELECT * FROM tm_task';
            } else {
                $sql = 'SELECT * FROM tm_task LEFT JOIN tm_task_relation ON id = child_id
                        WHERE parent_id IS NULL ';
            }

            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = TM_Task_Task::getInstanceByArray($user, $res);
                }
                return $retArray;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getAllInstance

    public static function getTaskByDocument(TM_User_User $user, TM_Document_Document $document)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM tm_task, tm_task_document WHERE tm_task.id=tm_task_document.task_id AND tm_task_document.document_id=' . $document->getId();
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = TM_Task_Task::getInstanceByArray($user, $res);
                }
                return $retArray;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     *
     * @param array $values
     * @return void
     * @access public
     */
    public function fillFromArray($values)
    {
        $this->setId($values['id']);
        $this->setTitle($values['title']);
        $this->setDateCreate($values['date_create']);
        $this->setType($values['type']);

        $o_user = TM_User_User::getInstanceById($values['user_id']);
        $this->setUser($o_user);

        $this->getParent();
        $this->getAttributeList();
    } // end of member function fillFromArray

    /**
     *
     *
     * @return array
     * @access public
     */
    public function getChild()
    {
        if (is_null($this->_childTask) || empty($this->_childTask)) {
            try {
                $sql = 'SELECT * FROM tm_task_relation WHERE parent_id=' . $this->_id;
                $result = $this->_db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

                if (isset($result[0]['child_id'])) {
                    foreach ($result as $res) {
                        $this->_childTask[] = TM_Task_Task::getInstanceById($res['child_id']);
                    }
                } else {
                    $this->_childTask = array();
                }
                return $this->_childTask;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return $this->_childTask;
        }
    } // end of member function getChild

    /**
     * @return bool
     */
    public function hasChild()
    {
        if (!empty($this->_childTask)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     *
     * @param TM_Task_Task $child
     * @return void
     * @access public
     */
    public function addChild($child)
    {
        if ($this->_searchChild($child) === false) {
            $this->_childTask[] = $child;
        }

    } // end of member function addChild

    /**
     *
     *
     * @param TM_Task_Task $child
     * @return void
     * @access public
     */
    public function deleteChild($child)
    {
        $key = $this->_searchChild($child);
        if ($key !== false) {
            unset($this->_childTask[$key]);
        }
    } // end of member function deleteChild

    protected function saveChild()
    {
        try {
            $sql = 'DELETE FROM tm_task_relation WHERE parent_id=' . $this->_id;
            $this->_db->query($sql);

            if (!is_null($this->_childTask) && !empty($this->_childTask)) {
                $sql = 'INSERT INTO tm_task_relation(parent_id, child_id) VALUES';

                foreach ($this->_childTask as $child) {
                    $sql .= '(' . $this->_id . ', ' . $child->getId() . '), ';
                }

                $sql = substr($sql, 0, strlen($sql) - 2);
                $this->_db->query($sql);
            }

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    protected function _searchChild(TM_Task_Task $needle)
    {
        if (is_null($this->_childTask) && !empty($this->_childTask)) {
            return false;
        } else {
            foreach ($this->_childTask as $key => $child) {
                if ($child->_id == $needle->getId()) {
                    return $key;
                }
            }
            return false;
        }
    }

    /**
     *
     *
     * @return array
     * @access public
     */
    public function getParent()
    {
        if (is_null($this->_parentTask) || empty($this->_parentTask)) {
            try {
                $sql = 'SELECT * FROM tm_task_relation WHERE child_id=' . $this->_id;
                $result = $this->_db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

                if (isset($result[0]['parent_id'])) {
                    foreach ($result as $res) {
                        $this->_parentTask[] = TM_Task_Task::getInstanceById($res['parent_id']);
                    }
                } else {
                    $this->_parentTask = array();
                }
                return $this->_parentTask;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return $this->_parentTask;
        }
    } // end of member function getParent

    public function getFirstParent()
    {
        if (is_null($this->_parentTask) || empty($this->_parentTask)) {
            try {
                $sql = 'SELECT * FROM tm_task_relation WHERE child_id=' . $this->_id;
                $result = $this->_db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

                if (isset($result[0]['parent_id'])) {
                    foreach ($result as $res) {
                        $this->_parentTask[] = TM_Task_Task::getInstanceById($res['parent_id']);
                    }
                } else {
                    $this->_parentTask = array();
                }
                print_r($this->_parentTask[0]);
                return $this->_parentTask[0];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return $this->_parentTask[0];
        }
    }

    /**
     * @return bool
     */
    public function hasParent()
    {
        if (!empty($this->_parentTask)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     *
     * @param TM_Task_Task $parent
     * @return void
     * @access public
     */
    public function addParent(TM_Task_Task $parent)
    {
        if ($this->searchParent($parent) === false) {
            $this->_parentTask[] = $parent;
        }
    } // end of member function addParent

    /**
     *
     *
     * @param TM_Task_Task $parent
     * @return void
     * @access public
     */
    public function deleteParent($parent)
    {
        $key = $this->searchParent($parent);
        if ($key !== false) {
            unset($this->_parentTask[$key]);
        }
    } // end of member function deleteParent

    public function deleteAllParent()
    {
        $this->_parentTask = array();
    }

    protected function saveParent()
    {
        try {
            $sql = 'DELETE FROM tm_task_relation WHERE child_id=' . $this->_id;
            $this->_db->query($sql);

            if (!is_null($this->_parentTask) && !empty($this->_parentTask)) {
                $sql = 'INSERT INTO tm_task_relation(parent_id, child_id) VALUES';

                foreach ($this->_parentTask as $parent) {
                    $sql .= '(' . $parent->getId() . ', ' . $this->_id . '), ';
                }

                $sql = substr($sql, 0, strlen($sql) - 2);
                $this->_db->query($sql);
            }

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function searchParent(TM_Task_Task $needle)
    {
        if (is_null($this->_parentTask)) {
            return false;
        } else {
            foreach ($this->_parentTask as $key => $child) {
                if ($child->_id == $needle->getId()) {
                    return $key;
                }
            }
            return false;
        }
    }

    public function getAttributeList()
    {
        if (is_null($this->_attributeList) || empty($this->_attributeList)) {
            try {
                $attributeList = TM_Attribute_Attribute::getAllInstance(new TM_Task_AttributeMapper(), $this);
                if ($attributeList !== false) {
                    foreach ($attributeList as $attribute) {
                        $this->_attributeList[$attribute->attribyteKey] = $attribute;
                    }
                }

                return $this->_attributeList;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return $this->_attributeList;
        }
    }

    public function getAttribute($key)
    {
        return $this->_attributeList[$key];
    }

    public function setAttribute($key, $value)
    {
        if ($this->searchAttribute($key)) {
            $this->_attributeList[$key]->setValue($value);

        } else {
            $oHash = TM_Task_Hash::getInstanceById($key);
            $oAttribute = new TM_Attribute_Attribute(new TM_Task_AttributeMapper(), $this);
            $oAttribute->setAttribyteKey($key);
            $oAttribute->setType($oHash->getType());
            $oAttribute->setValue($value);

            $this->_attributeList[$key] = $oAttribute;
            $oAttribute->insertToDB();
        }
    }

    public function searchAttribute($needle)
    {
        if (is_null($this->_attributeList) && !empty($this->_attributeList)) {
            return false;
        } else {
            return array_key_exists($needle, $this->_attributeList);
        }
    }

    protected function saveAttributeList()
    {
        if (!is_null($this->_attributeList) && !empty($this->_attributeList)) {
            foreach ($this->_attributeList as $attribute) {
                $attribute->updateToDB();
            }
        }
    }

    public function getPathToTask(&$pathArray = array())
    {
        try {
            if (!empty($this->_parentTask)) {
                $parent = $this->_parentTask[0];
                $pathArray[] = $parent;

                $parent->getPathToTask($pathArray);
            }
            return array_reverse($pathArray);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    protected function _pathToTask(&$pathArray = array())
    {

    }

    public function getExecutant()
    {
        try {
            $taskAcl = TM_Acl_TaskAcl::getAllInstance($this);
            $userArray = array();
            if ($taskAcl) {
                foreach ($taskAcl as $acl) {
                    if ($acl->getIsExecutant()) {
                        $userArray[] = $acl->getUser();
                    }
                }
            }

            return $userArray;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

    public function getExecuteTime()
    {
        $deadline = time();
        if ($this->searchAttribute('state') && $this->getAttribute('state')->value == 'Выполнена') {
            if ($this->searchAttribute('deadline')) {
                $deadline = strtotime($this->getAttribute('deadline')->value);
            }
        }

        $diff = $deadline - strtotime($this->_dateCreate);

        return $diff;
    }

    public function getLeftTime()
    {
        $now = time();
        $deadline = time();

        if ($this->searchAttribute('state') && trim($this->getAttribute('state')->value) == 'Выполнена') {
            $deadline = $now;
        } else {
            if ($this->searchAttribute('deadline')) {
                $deadline = strtotime($this->getAttribute('deadline')->value);
            }
        }

        $diff = $deadline - $now;
        return $diff;
    }

    public function getIsOver()
    {
        $now = time();
        $deadline = time();

        if ($this->searchAttribute('deadline')) {
            $deadline = strtotime($this->getAttribute('deadline')->value);
        }

        $diff = $deadline - $now;
        if ($diff > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getTaskStatistic()
    {
        $statArray = array('is_complite' => 0, 'is_do' => 0, 'is_out' => 0, 'is_problem' => 0, 'doc_count' => 0, 'discuss_count' => 0);
        $this->getChild();

        foreach ($this->_childTask as $child) {
            if ($child->searchAttribute('state')) {
                if (trim($child->getAttribute('state')->value) == 'Выполнена') {
                    $statArray['is_complite'] += 1;
                } elseif (trim($child->getAttribute('state')->value) == 'Возникли вопросы') {
                    $statArray['is_problem'] += 1;
                } elseif (trim($child->getAttribute('state')->value) == 'Не выполнена' && !$this->getIsOver()) {
                    $statArray['is_do'] += 1;
                } elseif (trim($child->getAttribute('state')->value) == 'Не выполнена' && $this->getIsOver()) {
                    $statArray['is_out'] += 1;
                }
            } else {
                $statArray['is_do'] += 1;
            }
        }

        $doc_count = TM_Document_Document::getDocumentByTask($this->_user, $this);
        if ($doc_count) {
            $statArray['doc_count'] = count($doc_count);
        }

        $discuss_count = TM_Discussion_Discussion::getDiscussionByTask($this->_user, $this);
        if ($discuss_count) {
            $statArray['discuss_count'] = count($discuss_count);
        }
        return $statArray;
    }

    public function calcDeadLine()
    {

    }

    public static function getTaskByExecutant(TM_User_User $user)
    {
        try {
            $db = StdLib_DB::getInstance();

            $sql = 'SELECT id, title, tm_task.user_id, date_create, type
                    FROM tm_task LEFT JOIN (
                        SELECT * FROM tm_task_attribute WHERE attribute_key="deadline"
                    )t2 ON tm_task.id = t2.task_id LEFT JOIN (SELECT * FROM tm_task_attribute WHERE attribute_key="state") t3 ON tm_task.id = t3.task_id, tm_acl_task
                    WHERE tm_task.id=tm_acl_task.task_id
                      AND is_executant=1
                      AND tm_acl_task.user_id=' . $user->id . '
                      ORDER BY t3.attribute_value DESC, t2.attribute_value, title';
            //echo $sql;
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = TM_Task_Task::getInstanceByArray($user, $res);
                }
                return $retArray;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

} // end of TM_Task_Task
?>