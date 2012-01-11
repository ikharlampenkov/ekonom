<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28.12.11
 * Time: 11:44
 * To change this template use File | Settings | File Templates.
 */
/*
 * CREATE  TABLE IF NOT EXISTS `ekonom_pro_db`.`bplace` (
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
   `title` VARCHAR(255) NOT NULL ,
   `width` INT UNSIGNED NOT NULL ,
   `height` INT UNSIGNED NOT NULL ,
   PRIMARY KEY (`id`) )
 ENGINE = InnoDB


CREATE  TABLE IF NOT EXISTS `ekonom_pro_db`.`banner_place` (
  `banner_id` INT UNSIGNED NOT NULL ,
  `bplace_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`banner_id`, `bplace_id`) ,
  INDEX `fk_banner_place_banner1` (`banner_id` ASC) ,
  CONSTRAINT `fk_banner_place_bplace1`
    FOREIGN KEY (`bplace_id` )
    REFERENCES `ekonom_pro_db`.`bplace` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_banner_place_banner1`
    FOREIGN KEY (`banner_id` )
    REFERENCES `ekonom_pro_db`.`banner` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
 */

class EK_Banner_Place
{
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
     * @var int
     * @access protected
     */
    protected $_width;

    /**
     * @var int
     * @access protected
     */
    protected $_height;

    /**
     * @var int - время между сменой баннеров
     */
    protected $_changeTime = 5;
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
     * @return int
     * @access public
     */
    public function getWidth()
    {
        return $this->_db->prepareStringToOut($this->_width);
    }

    /**
     *
     *
     * @return int
     * @access public
     */
    public function getHeight()
    {
        return $this->_db->prepareStringToOut($this->_height);
    }

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
     * @param int $value
     * @return void
     * @access public
     */
    public function setWidth($value)
    {
        $this->_width = $this->_db->prepareString($value);
    }

    /**
     *
     *
     * @param int $value
     * @return void
     * @access public
     */
    public function setHeight($value)
    {
        $this->_height = $this->_db->prepareString($value);
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
     * @return EK_Banner_Place
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
            $sql = 'INSERT INTO bplace(title, width, height, change_time)
                        VALUES ("' . $this->_title . '", ' . $this->_width . ', ' . $this->_height . ', ' . $this->_changeTime . ')';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function insertToDb

    //id, title, width, height

    /**
     *
     *
     * @return void
     * @access public
     */
    public function updateToDb()
    {
        try {
            $sql = 'UPDATE bplace
                        SET title="' . $this->_title . '", width=' . $this->_width . ',
                            height=' . $this->_height . ', change_time=' . $this->_changeTime . '
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
            $sql = 'DELETE FROM bplace WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function deleteFromDb

    /**
     *
     *
     * @param int $id идентификатор города
     * @return EK_Banner_Place
     * @static
     * @access public
     */
    public static function getInstanceById($id)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM bplace WHERE id=' . (int)$id;
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new EK_Banner_Place();
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
     * @return EK_Banner_Place
     * @static
     * @access public
     */
    public static function getInstanceByArray($values)
    {
        try {
            $o = new EK_Banner_Place();
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    } // end of member function getInstanceByArray

    /**
     *
     *
     * @return array
     * @static
     * @access public
     */
    public static function getAllInstance()
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM bplace';

            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Banner_Place::getInstanceByArray($res);
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
        $this->setWidth($values['width']);
        $this->setHeight($values['height']);
        $this->setChangeTime($values['change_time']);
    }

    /**
     * @param int $changeTime
     */
    public function setChangeTime($changeTime)
    {
        $this->_changeTime = (int)$changeTime;
    }

    /**
     * @return int
     */
    public function getChangeTime()
    {
        return $this->_changeTime;
    } // end of member function fillFromArray


}

?>