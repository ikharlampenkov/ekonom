<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 25.11.11
 * Time: 16:12
 * To change this template use File | Settings | File Templates.
 */

/*
  id,
  city_id,
  address_id,
  address,
  phone
*/

class EK_Company_Address {

    /**
     *
     * @access protected
     */
    protected $_id;

    /**
     *
     * @access protected
     */
    protected $_address;

    /**
     *
     * @access protected
     */
    protected $_phone;

    /**
     * @var EK_City_City
     * @access protected
     */
    protected $_city = null;

    /**
     * @var EK_Company_Company
     * @access protected
     */
    protected $_company = null;

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
    public function getAddress()
    {
        return $this->_db->prepareStringToOut($this->_address);
    } // end of member function getTitle

    /**
     *
     *
     * @return EK_City_City
     * @access public
     */
    public function getCity()
    {
        return $this->_city;
    } // end of member function getUser

    /**
     *
     *
     * @return EK_Company_Company
     * @access public
     */
    public function getCompany()
    {
        return $this->_address;
    }

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getPnone()
    {
        return $this->_db->prepareStringToOut($this->_phone);
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
    public function setAddress($value)
    {
        $this->_address = $this->_db->prepareString($value);
    } // end of member function setTitle

    /**
     *
     *
     * @param EK_City_City $value
     *
     * @return void
     * @access public
     */
    public function setCity(EK_City_City $value)
    {
        $this->_city = $value;
    }

    /**
     *
     *
     * @param EK_Company_Company $value
     *
     * @return void
     * @access public
     */
    public function setCompany(EK_Company_Company $value)
    {
        $this->_address = $value;
    }

    /**
     *
     *
     * @param string $value

     * @return string
     * @access public
     */
    public function setPhone($value)
    {
        $this->_phone = $this->_db->prepareString($value);
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
     * @return EK_Company_Address
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
            $sql = 'INSERT INTO address(title, city_id, description, file)
                    VALUES ("' . $this->_title . '", ' . $this->_city->getId() . ', "' . $this->_description . '", "")';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function insertToDb


    //city_id, title, file, description

    /**
     *
     *
     * @return void
     * @access public
     */
    public function updateToDb()
    {
        try {
            $sql = 'UPDATE address
                    SET title="' . $this->_title . '", city_id=' . $this->_city->getId() . ', description="' . $this->_description . '"
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
            $sql = 'DELETE FROM address
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

     * @return EK_Company_Company
     * @static
     * @access public
     */
    public static function getInstanceById($id)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM address WHERE id=' . (int)$id;
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new EK_Company_Company();
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
     * @return EK_Company_Company
     * @static
     * @access public
     */
    public static function getInstanceByArray($values)
    {
        try {
            $o = new EK_Company_Company();
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

            $sql = 'SELECT * FROM address ';

            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Company_Company::getInstanceByArray($res);
                }
                return $retArray;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getAllInstance

    public static function getDocumentByCity(EK_City_City $city)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM address WHERE city_id=' . $city->getId();
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Company_Company::getInstanceByArray($res);
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
        $this->setDescription($values['description']);
        $this->setCity(EK_City_City::getInstanceById($values['city_id']));
        $this->_file->setName($values['file']);

        //$this->getAttributeList();
    } // end of member function fillFromArray

}
