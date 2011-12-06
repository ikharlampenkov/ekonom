<?php

/**
 * class EK_Catalog_Rubric
 *
 */
class EK_Catalog_Rubric {
    /** Aggregations: */
    /** Compositions: */
    /*     * * Attributes: ** */

    const IS_ROOT = 1;
    const IS_NOT_ROOT = 0;

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
     * @var EK_Company_Rubric
     * @access protected
     */
    protected $_parent;
    /**
     *
     * @access protected
     */
    protected $_isRoot = 0;
    private $_db;

    /**
     *
     *
     * @param int $id
     * @param string $title
     * @param EK_Company_Rubric|null $parent

     * @return EK_Catalog_Rubric
     * @access public
     */
    public function __construct($id = 0, $title = '', $parent = null) {
        $this->_db = StdLib_DB::getInstance();

        $this->_id = $id;
        $this->_title = $title;
        $this->_parent = $parent;
    }

// end of member function __construct

    /**
     *
     *
     * @return int
     * @access public
     */
    public function getId() {
        return $this->_id;
    }

// end of member function getId

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getTitle() {
        return $this->_title;
    }

// end of member function getName

    /**
     *
     *
     * @return EK_Company_Rubric
     * @access public
     */
    public function getParent() {
        return $this->_parent;
    }

// end of member function getParent

    /**
     *
     *
     * @return bool
     * @access public
     */
    public function getIsRoot() {
        return $this->_isRoot;
    }

// end of member function getIsRoot

    public function __get($name) {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    /**
     *
     *
     * @param int $value

     * @return void
     * @access public
     */
    public function setId($value) {
        $this->_id = $value;
    }

// end of member function setId

    /**
     *
     *
     * @param string $value

     * @return void
     * @access public
     */
    public function setTitle($value) {
        $this->_title = $value;
    }

// end of member function setName

    /**
     *
     *
     * @param EK_Company_Rubric $value

     * @return void
     * @access public
     */
    public function setParent($value) {
        $this->_parent = $value;
    }

// end of member function setParent

    /**
     *
     *
     * @param bool $value

     * @return void
     * @access public
     */
    public function setIsRoot($value) {
        $this->_isRoot = $value;
    }

// end of member function setIsRoot

    public function insertToDb() {
        try {
            $sql = 'INSERT INTO product_rubric (title, parent_id, is_root)
                    VALUES ("' . $this->_title . '", ' . $this->_parent->id . ', ' . EK_Catalog_Rubric::IS_NOT_ROOT . ')';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertID();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function updateToDb() {
        try {
            $sql = 'UPDATE product_rubric
                    SET title="' . $this->_title . '", parent_id="' . $this->_parent->id . '", is_root=' . EK_Catalog_Rubric::IS_NOT_ROOT . '
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function deleteFromDb() {
        try {
            $tempPC = new EK_Catalog_ProductCatalog();
            $tempPL = $tempPC->getAllProduct($this->_id);
            if ($tempPL !== false) {
                foreach ($tempPL as $product) {
                    $product->deleteFromDb();
                }
            }

            $sql = 'DELETE FROM product_rubric WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getPathToRubric(&$path = array()) {
        if ($this->_isRoot != EK_Catalog_Rubric::IS_ROOT) {
            $tempRubric = EK_Catalog_Rubric::getInstanceById($this->_parent->id);
            if ($tempRubric instanceof EK_Catalog_Rubric) {
                $path[] = $tempRubric;
                if ($tempRubric->getIsRoot() != EK_Catalog_Rubric::IS_ROOT) {
                    $tempRubric->getPathToRubric($path);
                }
            } else {
                return false;
            }
            return array_reverse($path);
        } else
            return false;
    }

    /**
     * @static
     * @param $id
     * @return bool|EK_Catalog_Rubric
     * @throws Exception
     */
    public static function getInstanceById($id) {
        try {
            $db = StdLib_DB::getInstance();
            $result = $db->query('SELECT * FROM product_rubric WHERE id=' . $id, StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0]) && !empty($result[0])) {
                $o = new EK_Catalog_Rubric();
                $o->assignByHash($result[0]);
                return $o;
            } else
                return false;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getInstanceByArray(array $array) {
        $o = new EK_Catalog_Rubric();
        $o->assignByHash($array);
        return $o;
    }

    public static function getRootRubric() {
        try {
            $db = StdLib_DB::getInstance();
            $result = $db->query('SELECT * FROM product_rubric WHERE is_root=' . EK_Catalog_Rubric::IS_ROOT, StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $o = new EK_Catalog_Rubric();
                $o->assignByHash($result[0]);
                return $o;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    protected function assignByHash($result) {
        $this->setId($result['id']);
        $this->setTitle($result['title']);

        if (!empty($result['parent_id'])) {
            $this->setParent(EK_Catalog_Rubric::getInstanceById($result['parent_id']));
        }
        $this->setIsRoot($result['is_root']);

    }

    public static  function getRubricTree() {
            $tree = array();

            $root = EK_Catalog_Rubric::getRootRubric();
            $tree[] = $root;

            $root->_getSubRubricTree($root->id, $tree);
            return $tree;
        }

        private function _getSubRubricTree($parent, &$tree) {
            $result = $this->_db->query('SELECT * FROM product_rubric WHERE parent_id=' . $parent, StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                foreach ($result as $res) {
                    $rubric = EK_Catalog_Rubric::getInstanceByArray($res);
                    $tree[] = $rubric;
                    $this->_getSubRubricTree($rubric->id, $tree);
                }
            } else
                return false;
        }

}

// end of EK_Catalog_Rubric
?>