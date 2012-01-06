<?php

/*
 * id,
  title,
  date_create,
  user_id,
  file,
  is_folder,
  parent_id
 */

/**
 * class EK_Gallery_Gallery
 *
 */
class EK_Gallery_Gallery
{

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
     *
     * @access protected
     */
    protected $_dateCreate;

    /**
     * @var TM_User_User
     * @access protected
     */
    protected $_user = null;

    /**
     * @var TM_FileManager_Image
     */
    protected $_file = null;

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

    public function setFile($file)
    {
        $this->_file = $file;
    }

    public function getFile()
    {
        return $this->_file;
    }

    protected function _prepareBool($value)
    {
        if ($value) {
            return 1;
        } else {
            return 0;
        }
    }

    protected function _prepareNull($value)
    {
        if (is_null($value) || empty($value)) {
            return 'NULL';
        } else {
            return $value;
        }

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
     * @return EK_Gallery_Gallery
     * @access public
     */
    public function __construct()
    {
        $this->_db = StdLib_DB::getInstance();
        $this->_file = new TM_FileManager_Image(Zend_Registry::get('production')->gallery->path);
        $this->_file->setSubPath('');
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
            $sql = 'INSERT INTO gallery(title, user_id, date_create, file)
                    VALUES ("' . $this->_title . '", ' . $this->_user->getId() . ', "' . $this->_dateCreate . '", "")';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();

            $fName = $this->_file->download('file');
            if ($fName !== false) {
                $this->_file->createPreview(130, 83);
                $sql = 'UPDATE gallery SET file="' . $fName . '" WHERE id=' . $this->_id;
                $this->_db->query($sql);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function insertToDb


    //title, date_create, user_id, file

    /**
     *
     *
     * @return void
     * @access public
     */
    public function updateToDb()
    {
        try {
            $sql = 'UPDATE gallery
                    SET title="' . $this->_title . '", user_id="' . $this->_user->getId() . '", date_create="' . $this->_dateCreate . '"
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);

            $fName = $this->_file->download('file');
            if ($fName !== false) {
                $this->_file->createPreview(130, 83);
                $sql = 'UPDATE gallery SET file="' . $fName . '" WHERE id=' . $this->_id;
                $this->_db->query($sql);
            }
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
            $this->_file->delete();

            $sql = 'DELETE FROM gallery
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
     * @return EK_Gallery_Gallery
     * @static
     * @access public
     */
    public static function getInstanceById($id)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM gallery WHERE id=' . (int)$id;
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new EK_Gallery_Gallery();
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
     * @param array $values
     * @return EK_Gallery_Gallery
     * @static
     * @access public
     */
    public static function getInstanceByArray($values)
    {
        try {
            $o = new EK_Gallery_Gallery();
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

            $sql = 'SELECT * FROM gallery ';

            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Gallery_Gallery::getInstanceByArray($res);
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
     * @param array $values
     * @return void
     * @access public
     */
    public function fillFromArray($values)
    {
        $this->setId($values['id']);
        $this->setTitle($values['title']);
        $this->setDateCreate($values['date_create']);

        $o_user = TM_User_User::getInstanceById($values['user_id']);
        $this->setUser($o_user);

        $this->_file->setName($values['file']);
    } // end of member function fillFromArray

} // end of EK_Gallery_Gallery
?>