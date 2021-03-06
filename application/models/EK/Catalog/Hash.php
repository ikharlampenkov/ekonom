<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Moris
 * Date: 19.11.11
 * Time: 14:38
 * To change this template use File | Settings | File Templates.
 */

class EK_Catalog_Hash
{

    /**
     *
     * @access protected
     */
    protected $_task;

    /**
     *
     * @access protected
     */
    protected $_attributeKey = '';

    /**
     *
     * @access protected
     */
    protected $_title;

    /**
     *
     * @var TM_Attribute_AttributeType
     * @access protected
     */
    protected $_type = null;

    /**
     * @var string
     */
    protected $_listValue = '';

    /**
     * @var bool
     */
    protected $_isRequired = false;

    /**
     * @var int
     */
    protected $_sortOrder = 1000;

    /**
     *
     * @access protected
     */
    protected $_db;

    /**
     *
     *
     * @return EK_Catalog_Catalog
     * @access public
     */
    public function getTask()
    {
        return $this->_task;
    } // end of member function getTask

    /**
     *
     *
     * @return Attribute::TM_Attribute_AttribyteType
     * @access public
     */
    public function getType()
    {
        return $this->_type;
    } // end of member function getType

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getAttributeKey()
    {
        return $this->_attributeKey;
    } // end of member function getAttribyteKey

    public function setAttributeKey($value)
    {
        $this->_attributeKey = $this->_db->prepareString($value);
    }

    /**
     *
     *
     * @param EK_Catalog_Product $value
     * @return void
     * @access protected
     */
    protected function setTask(EK_Catalog_Product $value)
    {
        $this->_task = $value;

    } // end of member function setTask

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
     * @param TM_Attribute_AttributeType $value
     * @return void
     * @access protected
     */
    public function setType(TM_Attribute_AttributeType $value)
    {
        $this->_type = $value;
    } // end of member function setType

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
     * @param array|string $value
     * @return void
     * @access public
     */
    public function setValueList($value)
    {
        if (is_array($value)) {
            $this->_listValue = $this->_db->prepareString(implode('||', $value));
        } else {
            $this->_listValue = $value;
        }
    } // end of member function setValueList

    /**
     *
     *
     * @param bool $asString
     * @return array|string
     * @access public
     */
    public function getValueList($asString = false)
    {
        if ($asString) {
            return $this->_listValue;
        } else {
            return explode('||', $this->_db->prepareStringToOut($this->_listValue));
        }

    } // end of member function getValueList

    /**
     * @param boolean $isRequired
     */
    public function setIsRequired($isRequired)
    {
        if ($isRequired === 'on') {
            $this->_isRequired = 1;
        } elseif (empty($isRequired)) {
            $this->_isRequired = 0;
        } else {
            $this->_isRequired = $isRequired;
        }
    }

    /**
     * @return boolean
     */
    public function getIsRequired()
    {
        return $this->_isRequired;
    }

    /**
     * @param int $sortOrder
     */
    public function setSortOrder($sortOrder)
    {
        $this->_sortOrder = $sortOrder;
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->_sortOrder;
    } // end of member function fillFromArray

    protected function _prepareBool($value)
    {
        if ($value) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @param $name
     * @return mixed
     */
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
     * @return EK_Catalog_Hash
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
            $sql = 'INSERT INTO product_hash(product_id, attribute_key, title, type_id, list_value, required, sort_order)
                    VALUES (NULL, "' . $this->_attributeKey . '", "' . $this->_title . '", ' . $this->_type->getId() . ',
                            "' . $this->_listValue . ' ", ' . $this->_prepareBool($this->_isRequired) . ', ' . $this->_sortOrder . ')';
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function insertToDb

    //product_id, attribute_key, title, type_id, required, sort_order

    /**
     *
     *
     * @return void
     * @access public
     */
    public function updateToDb()
    {
        try {
            $sql = 'UPDATE product_hash
                    SET title="' . $this->_title . '", type_id=' . $this->_type->getId() . ',
                        list_value="' . $this->_listValue . ' ", required=' . $this->_prepareBool($this->_isRequired) . ',
                        sort_order=' . $this->_sortOrder . '
                    WHERE product_id IS NULL AND attribute_key="' . $this->_attributeKey . '"';
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
            $sql = 'DELETE FROM product_hash
                    WHERE product_id IS NULL AND attribute_key="' . $this->_attributeKey . '"';
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function deleteFromDb

    /**
     *
     *
     * @param int $key идентификатор задачи
     * @return EK_Catalog_Hash
     * @static
     * @access public
     */
    public static function getInstanceById($key)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM product_hash WHERE product_id IS NULL AND attribute_key="' . $key . '"';
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new EK_Catalog_Hash();
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
     * @return EK_Catalog_Hash
     * @static
     * @access public
     */
    public static function getInstanceByArray($values)
    {
        try {
            $o = new EK_Catalog_Hash();
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getInstanceByArray

    /**
     *
     * @param $object
     * @return array
     * @static
     * @access public
     */
    public static function getAllInstance($object = null)
    {
        try {
            $db = StdLib_DB::getInstance();

            $sql = 'SELECT product_hash.attribute_key, title, product_hash.type_id, list_value, required, sort_order
                    FROM product_hash ';

            if (!is_null($object)) {
            $sql .= ' LEFT JOIN (
                        SELECT * FROM product_attribute WHERE product_attribute.product_id=' . $object->id . '
                    ) t2 ON product_hash.attribute_key=t2.attribute_key
                    ORDER BY required DESC, sort_order, title';
            } else {
                $sql .= ' ORDER BY required DESC, sort_order, title';
            }

            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Catalog_Hash::getInstanceByArray($res);
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
        //$this->setTask($values['product_id']);
        $this->setAttributeKey($values['attribute_key']);
        $this->setTitle($values['title']);

        $this->setType(TM_Attribute_AttributeTypeFactory::getAttributeTypeById(new EK_Catalog_AttributeTypeMapper(), $values['type_id']));
        $this->setValueList($values['list_value']);
        $this->setIsRequired($values['required']);
        $this->setSortOrder($values['sort_order']);
    }

}
