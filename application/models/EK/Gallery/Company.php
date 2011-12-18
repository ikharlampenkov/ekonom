<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Moris
 * Date: 18.12.11
 * Time: 20:54
 * To change this template use File | Settings | File Templates.
 */
class EK_Gallery_Company extends EK_Gallery_Gallery
{

    public function __construct()
    {
        parent::__construct();

        $this->_file->setSubPath('/company');
    }

    public function insertToDb($company)
    {
        parent::insertToDb();
        $this->setLinkTo($company);
    }

    public function deleteFromDb($company)
    {
        parent::deleteFromDb();
        $this->deleteLinkTo($company);
    }

    public static function getAllInstance(EK_Company_Company $company)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM gallery, gallery_company
                        WHERE gallery.id=gallery_company.gallery_id
                          AND gallery_company.company_id=' . $company->getId();
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Gallery_Company::getInstanceByArray($res);
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
         * @return EK_Gallery_Company
         * @static
         * @access public
         */
        public static function getInstanceById($id)
        {
            try {
                $db = StdLib_DB::getInstance();
                $sql = 'SELECT * FROM gallery WHERE id=' . (int)$id;
                $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);

                if (isset($result[0])) {
                    $o = new EK_Gallery_Company();
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
         * @return EK_Gallery_Company
         * @static
         * @access public
         */
        public static function getInstanceByArray($values)
        {
            try {
                $o = new EK_Gallery_Company();
                $o->fillFromArray($values);
                return $o;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } // end of member function getInstanceByArray

    protected function setLinkTo($company)
    {
        try {
            $sql = 'INSERT INTO gallery_company(company_id, gallery_id) VALUES(' . $company->id . ', ' . $this->_id . ')';
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    protected function deleteLinkTo($company)
    {
        try {
            $sql = 'DELETE FROM gallery_company WHERE company_id=' . $company->id . ' AND gallery_id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}
