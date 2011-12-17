<?php

class CompanyController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        $this->view->assign('companyList', EK_Company_Company::getAllInstance());
    }

    public function viewAction()
    {
        $oCompany = EK_Company_Company::getInstanceById($this->getRequest()->getParam('id'));
        $this->view->assign('company', $oCompany);
        $this->view->assign('addressList', EK_Company_Address::getAllInstance($oCompany));
    }

    public function addAction()
    {
        $oCompany = new EK_Company_Company();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oCompany->setTitle($data['title']);
            $oCompany->setDescription($data['description']);
            $oCompany->setCity(EK_City_City::getInstanceById($data['city_id']));


            try {
                $oCompany->insertToDb();
                $this->_redirect('/company/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('cityList', EK_City_City::getAllInstance());
        $this->view->assign('company', $oCompany);
    }

    public function editAction()
    {
        $oCompany = EK_Company_Company::getInstanceById($this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oCompany->setTitle($data['title']);
            $oCompany->setDescription($data['description']);
            $oCompany->setCity(EK_City_City::getInstanceById($data['city_id']));

            try {
                $oCompany->updateToDb();
                $this->_redirect('/company/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('cityList', EK_City_City::getAllInstance());
        $this->view->assign('company', $oCompany);
    }

    public function deleteAction()
    {
        $oCompany = EK_Company_Company::getInstanceById($this->getRequest()->getParam('id'));
        try {
            $oCompany->deleteFromDB();
            $this->_redirect('/company/');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());

        }
    }

    public function viewaddressAction()
    {
        $oCompany = EK_Company_Company::getInstanceById($this->getRequest()->getParam('idcompany'));
        $this->view->assign('company', $oCompany);

        $this->view->assign('addressList', EK_Company_Address::getAllInstance($oCompany));
    }

    public function addaddressAction()
    {
        $oAddress = new EK_Company_Address(EK_Company_Company::getInstanceById($this->getRequest()->getParam('idcompany')), $this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oAddress->setAddress($data['address']);
            $oAddress->setPhone($data['phone']);
            $oAddress->setCity(EK_City_City::getInstanceById($data['city']));

            try {
                $oAddress->insertToDb();
                $this->_redirect('/company/viewAddress/idcompany/' . $this->getRequest()->getParam('idcompany', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('cityList', EK_City_City::getAllInstance());
        $this->view->assign('address', $oAddress);
    }

    public function editaddressAction()
    {
       $oAddress = EK_Company_Address::getInstanceById(EK_Company_Company::getInstanceById($this->getRequest()->getParam('idcompany')), $this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oAddress->setAddress($data['address']);
            $oAddress->setPhone($data['phone']);
            $oAddress->setCity(EK_City_City::getInstanceById($data['city']));

            try {
                $oAddress->updateToDb();
                $this->_redirect('/company/viewAddress/idcompany/' . $this->getRequest()->getParam('idcompany', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('cityList', EK_City_City::getAllInstance());
        $this->view->assign('address', $oAddress);
    }

    public function deleteaddressAction()
    {
        $oAddress = EK_Company_Address::getInstanceById(EK_Company_Company::getInstanceById($this->getRequest()->getParam('idcompany')), $this->getRequest()->getParam('id'));
        try {
            $oAddress->deleteFromDB();
            $this->_redirect('/company/viewAddress/idcompany/' . $this->getRequest()->getParam('idcompany', 0));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function showaclAction()
        {
            $oCompany = EK_Company_Company::getInstanceById($this->getRequest()->getParam('idCompany'));

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getParam('data');

                try {
                    foreach ($data as $idUser => $values) {

                        $companyAcl = new EK_Acl_CompanyAcl($oCompany);

                        $companyAcl->setUser(TM_User_User::getInstanceById($idUser));
                        $companyAcl->setIsRead($values['is_read']);
                        $companyAcl->setIsWrite($values['is_write']);
                        $companyAcl->setIsModerate($values['is_moderate']);
                        $companyAcl->saveToDb();
                    }

                    $this->_redirect('/company/showAcl/idCompany/' . $this->getRequest()->getParam('idCompany'));
                } catch (Exception $e) {
                    $this->view->assign('exception_msg', $e->getMessage());
                }
            }

            $this->view->assign('companyAcl', EK_Acl_CompanyAcl::getAllInstance($oCompany));
            $this->view->assign('userList', TM_User_User::getAllInstance());
            $this->view->assign('company', $oCompany);
        }
}

