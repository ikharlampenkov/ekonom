<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28.12.11
 * Time: 13:04
 * To change this template use File | Settings | File Templates.
 */
class EK_Banner_PlaceMark
{

    /**
     * @var EK_Banner_Place
     */
    protected $_place;

    /**
     * @var EK_Banner_Banner
     */
    protected $_banner;

    /**
     * @var StdLib_DB
     */
    protected $_db;

    /**
     * @param EK_Banner_Banner $banner
     */
    public function setBanner($banner)
    {
        $this->_banner = $banner;
    }

    /**
     * @return EK_Banner_Banner
     */
    public function getBanner()
    {
        return $this->_banner;
    }

    /**
     *
     *
     * @param EK_Banner_Place $place
     */
    public function setPlace($place)
    {
        $this->_place = $place;
    }

    /**
     * @return EK_Banner_Place
     */
    public function getPlace()
    {
        return $this->_place;
    }

    /**
     * @param $place
     * @return EK_Banner_PlaceMark
     */
    public function __construct($place)
    {
        $this->_db = StdLib_DB::getInstance();
        $this->_place = $place;
    }

    /**
     *
     *
     * @return void
     * @access public
     */
    public function saveToDb()
    {
        try {
            $sql = 'REPLACE INTO banner_place(banner_id, bplace_id)
                                VALUES (' . $this->_banner->getId() . ', ' . $this->_place->getId() . ')';
            $this->_db->query($sql);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteFromDB($place)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'DELETE FROM banner_place WHERE bplace_id=' . $place->getId();
            $db->query($sql);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

    //banner_id, bplace_id

    /**
     *
     * @param $place
     * @param array $values
     * @return EK_Banner_PlaceMark
     * @static
     * @access public
     */
    public static function getInstanceByArray($place, $values)
    {
        try {
            $o = new EK_Banner_PlaceMark($place);
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     * @param $place
     * @return array
     * @static
     * @access public
     */
    public static function getAllInstance($place)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM banner_place WHERE bplace_id=' . $place->getId();
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[$res['banner_id']] = EK_Banner_PlaceMark::getInstanceByArray($place, $res);
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
        $this->setBanner(EK_Banner_Banner::getInstanceById($values['banner_id']));
    }
}
