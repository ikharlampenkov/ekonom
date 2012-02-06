<?php


class BannerController extends Zend_Controller_Action
{
    protected $_user = null;

    protected $_city = 1;

    public function init()
    {
        $storage_data = Zend_Auth::getInstance()->getStorage()->read();
        $this->_user = TM_User_User::getInstanceById($storage_data->id);

        $mainSession = new Zend_Session_Namespace('main');
        $this->_city = $mainSession->curCity;
    }

    public function indexAction()
    {
        $this->view->assign('bannerList', EK_Banner_Banner::getAllInstance($this->_city));
    }

    public function addAction()
    {
        $oBanner = new EK_Banner_Banner();
        $oBanner->setCity(EK_City_City::getInstanceById($this->_city));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oBanner->setTitle($data['title']);
            $oBanner->setLink($data['link']);
            $oBanner->setCity(EK_City_City::getInstanceById($data['city_id']));

            try {
                $oBanner->insertToDb();
                $this->_redirect('/banner/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('banner', $oBanner);
        $this->view->assign('cityList', EK_City_City::getAllInstance());
    }

    public function editAction()
    {
        $oBanner = EK_Banner_Banner::getInstanceById($this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oBanner->setTitle($data['title']);
            $oBanner->setLink($data['link']);
            $oBanner->setCity(EK_City_City::getInstanceById($data['city_id']));

            try {
                $oBanner->updateToDb();
                $this->_redirect('/banner/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('banner', $oBanner);
        $this->view->assign('cityList', EK_City_City::getAllInstance());
    }

    public function deleteAction()
    {
        $oBanner = EK_Banner_Banner::getInstanceById($this->getRequest()->getParam('id'));
        try {
            $oBanner->deleteFromDB();
            $this->_redirect('/banner/');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());

        }
    }

    public function viewplaceAction()
    {
        $this->view->assign('placeList', EK_Banner_Place::getAllInstance());
    }

    public function addplaceAction()
    {
        $oPlace = new EK_Banner_Place();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oPlace->setTitle($data['title']);
            $oPlace->setWidth($data['width']);
            $oPlace->setHeight($data['height']);
            $oPlace->setChangeTime($data['change_time']);

            try {
                $oPlace->insertToDb();
                $this->_redirect('/banner/viewPlace/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('cityList', EK_City_City::getAllInstance());
        $this->view->assign('place', $oPlace);
    }

    public function editplaceAction()
    {
        $oPlace = EK_Banner_Place::getInstanceById($this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oPlace->setTitle($data['title']);
            $oPlace->setWidth($data['width']);
            $oPlace->setHeight($data['height']);
            $oPlace->setChangeTime($data['change_time']);

            try {
                $oPlace->updateToDb();
                $this->_redirect('/banner/viewPlace/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('cityList', EK_City_City::getAllInstance());
        $this->view->assign('place', $oPlace);
    }

    public function deleteplaceAction()
    {
        $oPlace = EK_Banner_Place::getInstanceById($this->getRequest()->getParam('id'));
        try {
            $oPlace->deleteFromDB();
            $this->_redirect('/banner/viewPlace/');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function placemarkAction()
    {
        $oPlace = EK_Banner_Place::getInstanceById($this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            EK_Banner_PlaceMark::deleteFromDB($oPlace);
            try {
                foreach ($data as $idBanner => $values) {

                    $companyAcl = new EK_Banner_PlaceMark($oPlace);
                    $companyAcl->setBanner(EK_Banner_Banner::getInstanceById($idBanner));

                    $companyAcl->saveToDb();
                }

                $this->_redirect('/banner/viewPlace/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }
        }

        $this->view->assign('placeAcl', EK_Banner_PlaceMark::getAllInstance($oPlace));
        $this->view->assign('bannerList', EK_Banner_Banner::getAllInstance());
        $this->view->assign('place', $oPlace);
    }
}

?>