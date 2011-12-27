<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 27.12.11
 * Time: 13:38
 * To change this template use File | Settings | File Templates.
 */
class EK_Comments_Product extends EK_Comments_Comments
{

    public function insertToDb($product)
    {
        parent::insertToDb();
        $this->setLinkTo($product);
    }

    public function deleteFromDb($product)
    {
        parent::deleteFromDb();
        $this->deleteLinkTo($product);
    }

    public static function getAllInstance(EK_Catalog_Product $product)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM comments, comments_product
                    WHERE comments.id=comments_product.comments_id
                     AND comments_product.product_id=' . $product->getId();
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Comments_Product::getInstanceByArray($res);
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
     * @param int $id идентификатор задачи
     * @return EK_Comments_Product
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
                $o = new EK_Comments_Product();
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
     * @return EK_Comments_Product
     * @static
     * @access public
     */
    public static function getInstanceByArray($values)
    {
        try {
            $o = new EK_Comments_Product();
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getInstanceByArray

    protected function setLinkTo($product)
    {
        try {
            $sql = 'INSERT INTO comments_product(product_id, comments_id) VALUES(' . $product->id . ', ' . $this->_id . ')';
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    protected function deleteLinkTo($product)
    {
        try {
            $sql = 'DELETE FROM comments_product WHERE product_id=' . $product->id . ' AND comments_id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}
