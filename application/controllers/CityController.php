<?php

class CityController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        $this->view->assign('cityList', EK_City_City::getAllInstance());
    }

    public function addAction()
    {
        $oCity = new EK_City_City();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oCity->setTitle($data['title']);
            $oCity->setPhoneCode($data['phone_code']);

            try {
                $oCity->insertToDb();
                $this->_redirect('/city/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('city', $oCity);
    }

    public function editAction()
    {
        $oCity = EK_City_City::getInstanceById($this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oCity->setTitle($data['title']);
            $oCity->setPhoneCode($data['phone_code']);

            try {
                $oCity->updateToDb();
                $this->_redirect('/city/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('city', $oCity);
    }

    public function deleteAction()
    {
        $oCity = EK_City_City::getInstanceById($this->getRequest()->getParam('id'));
        try {
            $oCity->deleteFromDB();
            $this->_redirect('/city/');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());

        }
    }


}

