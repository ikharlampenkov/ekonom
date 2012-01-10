<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Moris
 * Date: 10.01.12
 * Time: 23:05
 * To change this template use File | Settings | File Templates.
 */

/**
 * CREATE TABLE IF NOT EXISTS `product_like` (
`product_id` int(10) unsigned NOT NULL,
`like` int(10) unsigned NOT NULL DEFAULT '0',
`unlike` int(10) unsigned NOT NULL DEFAULT '0',
PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 */

class EK_Catalog_ProductLike
{

    /**
     * @var EK_Catalog_Product
     */
    protected $_product;

    /**
     * @var int
     */
    protected $_like = 0;

    /**
     * @var int
     */
    protected $_unlike = 0;

    /**
     * @var StdLib_DB
     */
    protected $_db;

    /**
     * @param int $like
     */
    public function setLike($like)
    {
        $this->_like = $like;
    }

    /**
     * @return int
     */
    public function getLike()
    {
        return $this->_like;
    }

    /**
     * @param \EK_Catalog_Product $product
     */
    public function setProduct($product)
    {
        $this->_product = $product;
    }

    /**
     * @return \EK_Catalog_Product
     */
    public function getProduct()
    {
        return $this->_product;
    }

    /**
     * @param int $unlike
     */
    public function setUnlike($unlike)
    {
        $this->_unlike = $unlike;
    }

    /**
     * @return int
     */
    public function getUnlike()
    {
        return $this->_unlike;
    }

    public function __get($name)
    {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function __construct(EK_Catalog_Product $product)
    {
        $this->_db = StdLib_DB::getInstance();
        $this->_product = $product;
    }

    public function setToDb()
    {
        try {
            if ($this->_check()) {
                $sql = 'INSERT INTO product (product_id, like, unlike)
                             VALUES (' . $this->_product->getId() . ', ' . $this->_like . ', ' . $this->_unlike . ')';
            } else {
                $sql = 'UPDATE product_like
                           SET like=' . $this->_like . ', unlike="' . $this->_unlike . '"
                        WHERE product_id=' . $this->_product->getId();
            }

            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function _check()
    {
        try {
            $sql = 'SELECT COUNT(product_id) FROM product_like WHERE product_id=' . $this->_product->getId();
            $result = $this->_db->query($sql);
            if (isset($result[0][0]) && $result[0][0] > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function getInstanceByProduct(EK_Catalog_Product $product)
    {
        try {
            $db = StdLib_DB::getInstance();
            $result = $db->query('SELECT * FROM product_like WHERE product_id=' . $product->getId(), StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $o = new EK_Catalog_ProductLike($product);
                $o->assignByHash($result[0]);
                return $o;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getInstanceByArray(EK_Catalog_Product $product, array $array)
    {
        $o = new EK_Catalog_ProductLike($product);
        $o->assignByHash($array);
        return $o;
    }

    protected function assignByHash(array $result)
    {
        $this->setLike($result['like']);
        $this->setUnlike($result['unlike']);
    }

}
