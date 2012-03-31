<?php

/**
 * class ProductCatalog
 *
 */
class EK_Catalog_ProductCatalog
{
    /** Aggregations: */

    /** Compositions: */
    /*     * * Attributes: ** */

    private $_db;

    public function __construct()
    {
        $this->_db = StdLib_DB::getInstance();
    }

    public function searchProduct($search, $city)
    {
        try {
            $sql = 'SELECT product.id AS id, product.title AS title, short_title, product_rubric_id, product.img, short_text, full_text, on_first_page, price, company_id
                    FROM product, company
                    WHERE product.company_id=company.id
                      AND (product.title LIKE "%' . $search . '%"
                       OR short_text LIKE "%' . $search . '%"
                       OR full_text LIKE "%' . $search . '%")
                       AND (city_id=' . $city . ' OR multi_city=1)';

            $result = $this->_db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $productArray = array();
                foreach ($result as $value) {
                    $productArray[] = EK_Catalog_Product::getInstanceByArray($value);
                }
                return $productArray;
            } else
                return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getAllRubric($parent)
    {
        try {
            $result = $this->_db->query('SELECT * FROM product_rubric WHERE parent_id=' . $parent, StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $rubricArray = array();
                foreach ($result as $value) {
                    $rubricArray[] = EK_Catalog_Rubric::getInstanceByArray($value);
                }
                return $rubricArray;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getAllProduct($rubric_id)
    {
        try {
            $result = $this->_db->query('SELECT * FROM product WHERE product_rubric_id=' . $rubric_id, StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $productArray = array();
                foreach ($result as $value) {
                    $productArray[] = EK_Catalog_Product::getInstanceByArray($value);
                }
                return $productArray;
            } else
                return false;
        } catch (Exception $e) {

            return false;
        }
    }

    public function getAllOrder()
    {
        try {
            $result = $this->_db->query('SELECT * FROM `order` ORDER BY is_complite, date DESC', StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $orderArray = array();
                foreach ($result as $value) {
                    $orderArray[] = Order::getInstanceByArray($value);
                }
                return $orderArray;
            } else
                return false;
        } catch (Exception $e) {

            return false;
        }
    }

    public function getAllOrderByUser($login)
    {
        try {
            $result = $this->_db->query('SELECT * FROM `order` WHERE user_login="' . $login . '" ORDER BY is_complite, date DESC', StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $orderArray = array();
                foreach ($result as $value) {
                    $orderArray[] = Order::getInstanceByArray($value);
                }
                return $orderArray;
            } else
                return false;
        } catch (Exception $e) {

            return false;
        }
    }

}

// end of ProductCatalog
?>