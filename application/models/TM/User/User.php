<?php

/*id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(32) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  `role_id` INT NOT NULL ,
  `date_create
*/

/**
 * class TM_User_User
 * 
 */
class TM_User_User
{

    /** Aggregations: */

    /** Compositions: */

     /*** Attributes: ***/


    protected $_id;

    protected $_login;

    protected $_password;

    protected $_role = null;

    protected $_dateCreate;

    protected $_db;


    public function setDateCreate($value)
    {
        $value = $this->_db->prepareString($value);
        $this->_dateCreate = date("Y-m-d H:i:s", strtotime($value));
    }

    public function getDateCreate()
    {
        return $this->_dateCreate;
    }

    protected function setId($id)
    {
        $this->_id = $id;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setLogin($value)
    {
        $this->_login = $this->_db->prepareString($value);
    }

    public function getLogin()
    {
        return $this->_login;
    }

    public function setPassword($value)
    {
        $this->_password = $this->_db->prepareString($value);
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setRole(TM_User_Role $value)
    {
        $this->_role = $value;
    }

    public function getRole()
    {
        return $this->_role;
    }

    public function __get($name) {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function __construct() {
        $this->_db = StdLib_DB::getInstance();

    }

    /**
     *
     *
     * @return
     * @access public
     */
    public function insertToDb()
    {
        try {
            $sql = 'INSERT INTO tm_user(login, password, role_id, date_create)
                    VALUES ("' . $this->_login . '", ' . $this->_password  . ', ' . $this->_role->getId() . ', "' . $this->_dateCreate . '")';
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function insertToDb

    /**
     *
     *
     * @return
     * @access public
     */
    public function updateToDb()
    {
        try {
            $sql = 'UPDATE tm_user
                    SET login="' . $this->_login . '", role_id="' . $this->_role->getId() . '", date_create="' . $this->_dateCreate . '"
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function updateToDb

    /**
     *
     *
     * @return
     * @access public
     */
    public function deleteFromDb()
    {
        try {
            $sql = 'DELETE FROM tm_user
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function deleteFromDb

    /**
     *
     *
     * @param int id

     * @return Task::tm_user_Task
     * @static
     * @access public
     */
    public static function getInstanceById($id)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM tm_user WHERE id=' . (int)$id;
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new TM_User_User();
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
     * @param int id

     * @return Task::tm_user_Task
     * @static
     * @access public
     */
    public static function getInstanceByLogin($login)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM tm_user WHERE login="' . $login . '"';
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new TM_User_User();
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
     * @param array values

     * @return Task::tm_user_Task
     * @static
     * @access public
     */
    public static function getInstanceByArray($values)
    {
        try {
            $o = new TM_User_User();
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getInstanceByArray

    /**
     *
     *
     * @return array
     * @static
     * @access public
     */
    public static function getAllInstance()
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM tm_user';
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = TM_User_User::getInstanceByArray($res);
                }
                return $retArray;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getAllInstance

    /**
     *
     *
     * @param array values

     * @return
     * @access public
     */
    public function fillFromArray($values)
    {
        $this->setId($values['id']);
        $this->setLogin($values['login']);
        $this->setDateCreate($values['date_create']);
        $this->setPassword($values['password']);

        $o_role = TM_User_Role::getInstanceById($values['role_id']);
        $this->setRole($o_role);
    } // end of member function fillFromArray

    


} // end of TM_User_User
?>
