<?php

/**
 * class EK_Catalog_Product
 *
 */
class EK_Catalog_Product {
    /** Aggregations: */
    /** Compositions: */
    /*     * * Attributes: ** */

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
     * @var TM_FileManager_Image
     * @access protected
     */
    protected $_img = null;
    /**
     *
     * @access protected
     */
    protected $_shortText;
    /**
     *
     * @access protected
     */
    protected $_fullText;
    /**
     *
     * @access protected
     */
    protected $_rubric = null;
    protected $_price = 0;
    private $_db;

    /**
     *
     *
     * @return
     * @access public
     */
    public function __construct($id = 0, $title = '') {
        $this->_db = StdLib_DB::getInstance();

        $this->_id = $id;
        $this->_title = $title;
    }

// end of member function __construct

    public function __get($name) {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

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

// end of member function getTitle

    /**
     *
     *
     * @return FileManager::TM_FileManager_Image
     * @access public
     */
    public function getImg() {
        return $this->_img;
    }

// end of member function getImg

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getShortText() {
        return $this->_shortText;
    }

// end of member function getShortText

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getFullText() {
        return $this->_fullText;
    }

// end of member function getFullText

    /**
     *
     *
     * @return EK_Catalog_Rubric
     * @access public
     */
    public function getRubric() {
        return $this->_rubric;
    }

// end of member function getRubric

    public function getPrice() {
        return $this->_price;
    }

    public function setId($value) {
        $this->_id = $value;
    }

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

// end of member function setTitle

    /**
     *
     *
     * @param string value

     * @return
     * @access public
     */
    public function setShortText($value) {
        $this->_shortText = $value;
    }

// end of member function setShortText

    public function setImg($value) {
        if (is_null($this->_img)) {
            $this->_img = $value;
        } else {
            $this->_img->setName($value);
        }
    }

    public function setRubric($value) {
        $this->_rubric = $value;
    }

    /**
     *
     *
     * @param string $value

     * @return void
     * @access public
     */
    public function setFullText($value) {
        $this->_fullText = $value;
    }

// end of member function setFullText

    public function setPrice($value) {
        if (!empty($value)) {
            $this->_price = str_replace(',', '.', $value);
        } else {
            $this->_price = 0;
        }
    }

    public function insertToDb() {
        global $__cfg;
        try {
            $sql = 'INSERT INTO product (product_rubric_id, title, short_text, full_text, price)
                    VALUES (' . $this->_rubric->id . ', "' . $this->_title . '", "' . $this->_shortText . '", "' . $this->_fullText . '", ' . $this->_price . ')';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();

            $this->_img = new TM_FileManager_Image(Zend_Registry::get('production')->files->path);

            $fileName = $this->_img->download('img');
            if ($fileName !== false) {
                $this->_img->createPreview();
                $this->_db->query('UPDATE product SET img="' . $fileName . '" WHERE id=' . $this->_id);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
            return null;
        }
    }

    public function updateToDb() {
        try {
            $sql = 'UPDATE product
                    SET product_rubric_id=' . $this->_rubric->id . ', title="' . $this->_title . '",
                        short_text="' . $this->_shortText . '", full_text="' . $this->_fullText . '",
                        price=' . $this->_price . '
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);

            $fileName = $this->_img->download('img');
            if ($fileName !== false) {
                $this->_img->createPreview();
                $this->_db->query('UPDATE product SET img="' . $fileName . '" WHERE id=' . $this->_id);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
            return null;
        }
    }

    public function deleteFromDb() {
        try {
            $this->_img->delete();

            $sql = 'DELETE FROM product WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function deleteImg() {
        try {
            $this->_img->delete();

            $sql = 'UPDATE product SET img=NULL
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getInstanceById($id) {
        try {
            $db = StdLib_DB::getInstance();
            $result = $db->query('SELECT * FROM product WHERE id=' . $id, StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $o = new EK_Catalog_Product();
                $o->assignByHash($result[0]);
                return $o;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
            return null;
        }
    }

    public static function getInstanceByArray(array $array) {
        $o = new EK_Catalog_Product();
        $o->assignByHash($array);
        return $o;
    }

    protected function assignByHash(array $result) {
        $this->setId($result['id']);
        $this->setTitle($result['title']);
        $this->setRubric(EK_Catalog_Rubric::getInstanceById($result['product_rubric_id']));
        $this->setImg(new TM_FileManager_Image(Zend_Registry::get('production')->files->path, $result['img']));
        $this->setShortText($result['short_text']);
        $this->setFullText($result['full_text']);
        $this->setPrice($result['price']);
    }

}

// end of EK_Catalog_Product
?>