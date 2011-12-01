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
  company_id,
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
     * @var string
     * @access protected
     */
    protected $_address;

    /**
     * @var string
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
        return $this->_company;
    }

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getPhone()
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
        $this->_company = $value;
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
     * @param $company
     * @return EK_Company_Address
     * @access public
     */
    public function __construct($company)
    {
        $this->_db = StdLib_DB::getInstance();
        $this->_company = $company;
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
            $sql = 'INSERT INTO company_address(city_id, company_id, address, phone)
                    VALUES (' . $this->_city->getId() . ', ' . $this->_company->getId() . ', "' . $this->_address . '", "' . $this->_phone . '")';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function insertToDb


    //city_id, company_id, address, phone

    /**
     *
     *
     * @return void
     * @access public
     */
    public function updateToDb()
    {
        try {
            $sql = 'UPDATE company_address
                    SET city_id=' . $this->_city->getId() . ', company_id=' . $this->_company->getId() . ',
                        address="' . $this->_address . '", phone="' . $this->_phone . '"
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
            $sql = 'DELETE FROM company_address
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function deleteFromDb

    /**
     *
     *
     * @param $company
     * @param int $id идентификатор задачи

     * @return EK_Company_Address
     * @static
     * @access public
     */
    public static function getInstanceById($company, $id)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM company_address WHERE id=' . (int)$id;
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new EK_Company_Address($company);
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
     * @param $company
     * @param array $values
     * @return EK_Company_Address
     * @static
     * @access public
     */
    public static function getInstanceByArray($company, $values)
    {
        try {
            $o = new EK_Company_Address($company);
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getInstanceByArray

    /**
     *
     * @param EK_Company_Company $company

     * @return array
     * @static
     * @access public
     */
    public static function getAllInstance($company)
    {
        try {
            $db = StdLib_DB::getInstance();

            $sql = 'SELECT * FROM company_address WHERE  company_id=' . $company->getId();

            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Company_Address::getInstanceByArray($company, $res);
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
        $this->setCity(EK_City_City::getInstanceById($values['city_id']));
        $this->setAddress($values['address']);
        $this->setPhone($values['phone']);

        //$this->getAttributeList();
    } // end of member function fillFromArray

}
