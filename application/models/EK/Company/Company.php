<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Moris
 * Date: 23.11.11
 * Time: 22:32
 * To change this template use File | Settings | File Templates.
 */
/*
  id,
  city_id,
  title,
  file,
  description
 */

class EK_Company_Company
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
    protected $_description;

    /**
     * @var EK_City_City
     * @access protected
     */
    protected $_city = null;

    /**
     * @var int - флаг мультигорода
     */
    protected $_multiCity = 0;

    protected $_file = null;

    /**
     * @var array
     */
    protected $_addressList = array();


    /**
     * @var string
     */
    protected $_orderEmail = '';

    /**
     * @var string - ссылка на официальный сайт
     */
    protected $_ofSite = '';

    /**
     * @var int - величина постоянной скидки, 0 - нет скидки
     */
    protected $_constantDiscount = 0;

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
     * @return string
     * @access public
     */
    public function getDescription()
    {
        return $this->_db->prepareStringToOut($this->_description);
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
     * @param string $value
     * @return string
     * @access public
     */
    public function setDescription($value)
    {
        $this->_description = $this->_db->prepareString($value);
    }

    public function setFile($file)
    {
        $this->_file = $file;
    }

    public function getFile()
    {
        return $this->_file;
    }

    /**
     * @param string $orderEmail
     */
    public function setOrderEmail($orderEmail)
    {
        $this->_orderEmail = $this->_db->prepareString($orderEmail);
    }

    /**
     * @return string
     */
    public function getOrderEmail()
    {
        return $this->_db->prepareStringToOut($this->_orderEmail);
    }

    /**
     * @param int $constantDiscount
     */
    public function setConstantDiscount($constantDiscount)
    {
        $this->_constantDiscount = $this->_db->prepareString($constantDiscount);
    }

    /**
     * @return int
     */
    public function getConstantDiscount()
    {
        return $this->_db->prepareStringToOut($this->_constantDiscount);
    }

    /**
     * @param string $ofSite
     */
    public function setOfSite($ofSite)
    {
        $this->_ofSite = str_replace('http://', '', $this->_db->prepareString($ofSite));
    }

    /**
     * @return string
     */
    public function getOfSite()
    {
        return $this->_db->prepareStringToOut($this->_ofSite);
    }

    /**
     * @param int $multiCity
     */
    public function setMultiCity($multiCity)
    {
        if ($multiCity === 'on') {
            $this->_multiCity = 1;
        } elseif (empty($multiCity)) {
            $this->_multiCity = 0;
        } else {
            $this->_multiCity = $multiCity;
        }
    }

    /**
     * @return int
     */
    public function getMultiCity()
    {
        return $this->_multiCity;
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
     * @return EK_Company_Company
     * @access public
     */
    public function __construct()
    {
        $this->_db = StdLib_DB::getInstance();
        $this->_file = new TM_FileManager_Image(Zend_Registry::get('production')->files->path);
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
            $sql = 'INSERT INTO company(title, city_id, multi_city, description, file, order_email, ofsite, constant_discount)
                    VALUES ("' . $this->_title . '", ' . $this->_city->getId() . ', ' . $this->_multiCity . ',
                            "' . $this->_description . '", "", "' . $this->_orderEmail . '",
                            "' . $this->_ofSite . '", "' . $this->_constantDiscount . '")';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();

            $fName = $this->_file->download('file');
            if ($fName !== false) {
                $this->_file->createPreview(190, 110);
                $sql = 'UPDATE company SET file="' . $fName . '" WHERE id=' . $this->_id;
                $this->_db->query($sql);
            }

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
            $sql = 'UPDATE company
                    SET title="' . $this->_title . '", city_id=' . $this->_city->getId() . ', multi_city=' . $this->_multiCity . ',
                        description="' . $this->_description . '", order_email="' . $this->_orderEmail . '",
                        ofsite="' . $this->_ofSite . '", constant_discount="' . $this->_constantDiscount . '"
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);

            $fName = $this->_file->download('file');
            if ($fName !== false) {
                $this->_file->createPreview(190, 110);
                $sql = 'UPDATE company SET file="' . $fName . '" WHERE id=' . $this->_id;
                $this->_db->query($sql);
            }

            //$this->saveAttributeList();
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

            $sql = 'DELETE FROM company
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
            $sql = 'SELECT * FROM company WHERE id=' . (int)$id;
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
     * @param int $city
     * @param EK_Catalog_Rubric|null $rubric
     *
     * @return array
     * @static
     * @access public
     */
    public static function getAllInstance($city = 1, $rubric = null)
    {
        try {
            $db = StdLib_DB::getInstance();

            $sql = 'SELECT * FROM company '; // WHERE city_id=' . (int)$city

            if (!is_null($rubric)) {
                $sql .= ' WHERE id IN (
                 SELECT DISTINCT company_id
                 FROM product, product_rubric
                 WHERE product.product_rubric_id=product_rubric.id
                   AND product_rubric.id=' . $rubric->id . '
                 )';
            } // AND

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

    public static function search($search)
    {
        try {
            $db = StdLib_DB::getInstance();
            $search = $db->prepareString($search);

            $sql = 'SELECT * FROM company WHERE title LIKE "%' . $search . '%" OR description LIKE "%' . $search . '%"'; // WHERE city_id=' . (int)$city

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

    public static function getDocumentByCity(EK_City_City $city)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM company WHERE city_id=' . $city->getId();
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
     * @param $user_id
     *
     * @return EK_Company_Company
     * @static
     * @access public
     */
    public static function getInstanceByUser($user_id)
    {
        try {
            $db = StdLib_DB::getInstance();

            $sql = 'SELECT *
                    FROM company, company_user
                    WHERE company.id=company_user.company_id
                      AND is_moderate=1
                      AND user_id=' . (int)$user_id;


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
        $this->setDescription($values['description']);
        $this->setCity(EK_City_City::getInstanceById($values['city_id']));
        $this->setMultiCity($values['multi_city']);
        $this->_file->setName($values['file']);
        $this->setOrderEmail($values['order_email']);
        $this->setOfSite($values['ofsite']);
        $this->setConstantDiscount($values['constant_discount']);

        //$this->getAttributeList();
    }

    /**
     * @param array $addressList
     */
    public function setAddressList($addressList)
    {
        $this->_addressList = $addressList;
    }

    /**
     * @return array
     */
    public function getAddressList()
    {
        if (empty($this->_addressList)) {
            $this->_addressList = EK_Company_Address::getAllInstance($this);
        }
        return $this->_addressList;
    }

    /*
    public function getAttributeList()
    {
        if (is_null($this->_attributeList) || empty($this->_attributeList)) {
            try {
                $attributeList = TM_Attribute_Attribute::getAllInstance(new TM_Document_AttributeMapper(), $this);
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
            $oHash = TM_Document_Hash::getInstanceById($key);
            $oAttribute = new TM_Attribute_Attribute(new TM_Document_AttributeMapper(), $this);
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
    */

}

?>