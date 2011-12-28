<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28.12.11
 * Time: 11:42
 * To change this template use File | Settings | File Templates.
 */

/*
 * CREATE  TABLE IF NOT EXISTS `ekonom_pro_db`.`banner` (
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
   `img` VARCHAR(255) NOT NULL ,
   `link` VARCHAR(255) NOT NULL ,
   `title` VARCHAR(255) NOT NULL ,
   PRIMARY KEY (`id`) )
 ENGINE = InnoDB
 */

class EK_Banner_Banner
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
     * @var string
     * @access protected
     */
    protected $_link;


    /**
     * @var TM_FileManager_Image|null
     */
    protected $_img = null;

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
     * @return string
     * @access public
     */
    public function getLink()
    {
        return $this->_db->prepareStringToOut($this->_link);
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
     * @param string $value
     * @return string
     * @access public
     */
    public function setLink($value)
    {
        $this->_link = $this->_db->prepareString($value);
    }

    public function setImg($file)
    {
        $this->_img = $file;
    }

    public function getImg()
    {
        return $this->_img;
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
     * @return EK_Banner_Banner
     * @access public
     */
    public function __construct()
    {
        $this->_db = StdLib_DB::getInstance();
        $this->_img = new TM_FileManager_Image(Zend_Registry::get('production')->banner->path);
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
            $sql = 'INSERT INTO banner(title, link, img)
                        VALUES ("' . $this->_title . '", "' . $this->_link . '", "")';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();

            $fName = $this->_img->download('img');
            if ($fName !== false) {
                $this->_img->createPreview(190, 110);
                $sql = 'UPDATE banner SET img="' . $fName . '" WHERE id=' . $this->_id;
                $this->_db->query($sql);
            }

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function insertToDb


    //id, img, title, link

    /**
     *
     *
     * @return void
     * @access public
     */
    public function updateToDb()
    {
        try {
            $sql = 'UPDATE banner
                        SET title="' . $this->_title . '", link="' . $this->_link . '"
                        WHERE id=' . $this->_id;
            $this->_db->query($sql);

            $fName = $this->_img->download('img');
            if ($fName !== false) {
                $this->_img->createPreview(190, 110);
                $sql = 'UPDATE banner SET img="' . $fName . '" WHERE id=' . $this->_id;
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
            $this->_img->delete();

            $sql = 'DELETE FROM banner
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
     * @return EK_Banner_Banner
     * @static
     * @access public
     */
    public static function getInstanceById($id)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM banner WHERE id=' . (int)$id;
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new EK_Banner_Banner();
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
     * @return EK_Banner_Banner
     * @static
     * @access public
     */
    public static function getInstanceByArray($values)
    {
        try {
            $o = new EK_Banner_Banner();
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getInstanceByArray

    /**
     *
     * @param int $city
     *
     * @return array
     * @static
     * @access public
     */
    public static function getAllInstance($city = 1)
    {
        try {
            $db = StdLib_DB::getInstance();

            $sql = 'SELECT * FROM banner '; //WHERE city_id=' . (int)$city
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Banner_Banner::getInstanceByArray($res);
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
        $this->setTitle($values['title']);
        $this->setLink($values['link']);
        $this->_img->setName($values['img']);
    }
}

?>
