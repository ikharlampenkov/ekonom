<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 27.12.11
 * Time: 11:03
 * To change this template use File | Settings | File Templates.
 */

/*
 * CREATE  TABLE IF NOT EXISTS `comments` (
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
   `message` TEXT NOT NULL ,
   `date_create` DATETIME NOT NULL ,
   `user` VARCHAR(20) NOT NULL ,
   `is_moderate` TINYINT(1)  NOT NULL DEFAULT 0 ,
   PRIMARY KEY (`id`) )
 ENGINE = InnoDB
 */

class EK_Comments_Comments
{

    /**
         *
         * @access protected
         */
        protected $_id;
    
        /**
         *
         * @access protected
         */
        protected $_message;
    
        /**
         *
         * @access protected
         */
        protected $_dateCreate;
    
        /**
         *
         * @var string
         * @access protected
         */
        protected $_user = '';
    
        /**
         * @var bool
         */
        protected $_isModerate = false;

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
        public function getMessage()
        {
            return $this->_db->prepareStringToOut($this->_message);
        } // end of member function getTitle
    
        /**
         *
         *
         * @return string
         * @access public
         */
        public function getUser()
        {
            return $this->_db->prepareStringToOut($this->_user);
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
        public function setMessage($value)
        {
            $this->_message = $this->_db->prepareString($value);
        } // end of member function setTitle
    
        /**
         *
         *
         * @param string $value
         * @return void
         * @access public
         */
        public function setUser($value)
        {
            $this->_user = $this->_db->prepareString($value);
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

        public function setIsModerate($isModerate)
        {
            $this->_isModerate = $isModerate;
        }
    
        public function getIsModerate()
        {
            return $this->_isModerate;
        }

        public function __get($name)
        {
            $method = "get{$name}";
            if (method_exists($this, $method)) {
                return $this->$method();
            }
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
    
        /**
         *
         *
         * @return EK_Comments_Comments
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
                $sql = 'INSERT INTO comments(message, user, date_create, is_moderate)
                        VALUES ("' . $this->_message . '", "' . $this->_user . '", "' . $this->_dateCreate . '",
                                 ' . $this->_prepareBool($this->_isModerate) . ')';
                $this->_db->query($sql);
    
                $this->_id = $this->_db->getLastInsertId();
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } // end of member function insertToDb
    
    
        //id, message, date_create, user, is_moderate

        /**
         *
         *
         * @return void
         * @access public
         */
        public function updateToDb()
        {
            try {
                $sql = 'UPDATE comments
                        SET message="' . $this->_message . '", user="' . $this->_user . '", date_create="' . $this->_dateCreate . '",
                            is_moderate=' . $this->_prepareBool($this->_isModerate) . '
                        WHERE id=' . $this->_id;
                $this->_db->query($sql);
    
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
                $sql = 'DELETE FROM comments
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
         * @return EK_Comments_Comments
         * @static
         * @access public
         */
        public static function getInstanceById($id)
        {
            try {
                $db = StdLib_DB::getInstance();
                $sql = 'SELECT * FROM comments WHERE id=' . (int)$id;
                $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);
    
                if (isset($result[0])) {
                    $o = new EK_Comments_Comments();
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
         * @return EK_Comments_Comments
         * @static
         * @access public
         */
        public static function getInstanceByArray($values)
        {
            try {
                $o = new EK_Comments_Comments();
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
    
                $sql = 'SELECT * FROM comments ';
                $sql .= ' ORDER BY date_create';
                $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);
    
                if (isset($result[0])) {
                    $retArray = array();
                    foreach ($result as $res) {
                        $retArray[] = EK_Comments_Comments::getInstanceByArray($res);
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
            $this->setMessage($values['message']);
            $this->setDateCreate($values['date_create']);
            $this->setUser($values['user']);
            $this->setIsModerate($values['is_moderate']);
        }
}