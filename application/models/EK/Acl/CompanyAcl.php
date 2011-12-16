<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 16.12.11
 * Time: 15:14
 * To change this template use File | Settings | File Templates.
 */

/*
 * CREATE  TABLE IF NOT EXISTS `company_user` (
   `company_id` INT(10) UNSIGNED NOT NULL ,
   `tm_user_id` INT(10) UNSIGNED NOT NULL ,
   `is_moderate` TINYINT(1)  NOT NULL DEFAULT 0 ,
   PRIMARY KEY (`company_id`, `tm_user_id`) ,
   INDEX `fk_user_company_tm_user1` (`tm_user_id` ASC) ,
   CONSTRAINT `fk_user_company_company1`
     FOREIGN KEY (`company_id` )
     REFERENCES `company` (`id` )
     ON DELETE NO ACTION
     ON UPDATE NO ACTION,
   CONSTRAINT `fk_user_company_tm_user1`
     FOREIGN KEY (`tm_user_id` )
     REFERENCES `tm_user` (`id` )
     ON DELETE NO ACTION
     ON UPDATE NO ACTION)
 ENGINE = InnoDB
 */
class EK_Acl_CompanyAcl extends TM_Acl_UserAcl
{
    /**
     * @var bool
     */
    protected $_isModerate = 0;

    /**
     * @var StdLib_DB
     */
    protected $_db;

    /**
     * @param boolean $isAllow
     */
    public function setIsModerate($isAllow)
    {
        if ($isAllow === 'on') {
            $this->_isModerate = 1;
        } elseif (empty($isAllow)) {
            $this->_isModerate = 0;
        } else {
            $this->_isModerate = $isAllow;
        }
    }

    /**
     * @return boolean
     */
    public function getIsModerate()
    {
        return $this->_isModerate;
    }

    public function __construct($object)
    {
        parent::__construct($object);
        $this->_isRead = 1;
        $this->_isWrite = 1;
        $this->_isModerate = 0;
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
            $sql = 'REPLACE INTO company_user(user_id, company_id, is_read, is_write, is_moderate)
                            VALUES (' . $this->_user->getId() . ', ' . $this->_object->getId() . ', ' . $this->_isRead . ', ' . $this->_isWrite . ', ' . $this->_isModerate . ')';
            $this->_db->query($sql);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //company_id, user_id, is_moderate

    /**
     *
     * @param $object
     * @param array $values
     * @return TM_User_RoleAcl
     * @static
     * @access public
     */
    public static function getInstanceByArray($object, $values)
    {
        try {
            $o = new EK_Acl_CompanyAcl($object);
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     * @param $object
     * @return array
     * @static
     * @access public
     */
    public static function getAllInstance($object)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM company_user WHERE company_id=' . $object->getId();
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[$res['user_id']] = EK_Acl_CompanyAcl::getInstanceByArray($object, $res);
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
        $this->setUser(TM_User_User::getInstanceById($values['user_id']));
        $this->setIsRead($values['is_read']);
        $this->setIsWrite($values['is_write']);
        $this->setIsModerate($values['is_moderate']);
    }
}
