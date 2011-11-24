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

            /*
            foreach ($data['attribute'] as $key => $value) {
                $oCompany->setAttribute($key, $value);
            }
            */

            try {
                $oCompany->updateToDb();
                $this->_redirect('/company/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        //$this->view->assign('attributeHashList', EK_Company_Hash::getAllInstance());

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
        // action body
    }

    /*
    public function addattributetypeAction()
    {
        $oType = new EK_Attribute_AttributeType(new EK_Company_AttributeTypeMapper());

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oType->setTitle($data['title']);
            $oType->setDescription($data['description']);
            $oType->setHandler($data['handler']);

            try {
                $oType->insertToDb();
                $this->_redirect('/company/index/parent/' . $this->getRequest()->getParam('parent', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('type', $oType);
    }

    public function editattributetypeAction()
    {
       $oType = EK_Attribute_AttributeTypeFactory::getAttributeTypeById(new EK_Company_AttributeTypeMapper(), $this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oType->setTitle($data['title']);
            $oType->setDescription($data['description']);
            $oType->setHandler($data['handler']);

            try {
                $oType->updateToDb();
                $this->_redirect('/company/index/parent/' . $this->getRequest()->getParam('parent', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('type', $oType);
    }

    public function deleteattributetypeAction()
    {
        $oType = EK_Attribute_AttributeTypeFactory::getAttributeTypeById(new EK_Company_AttributeTypeMapper(), $this->getRequest()->getParam('id'));
        try {
            $oType->deleteFromDB();
            $this->_redirect('/company/index/parent/' . $this->getRequest()->getParam('parent', 0));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function addattributehashAction()
    {
        $oHash = new EK_Company_Hash();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oHash->setAttributeKey($data['attribute_key']);
            $oHash->setTitle($data['title']);
            $oHash->setType(EK_Attribute_AttributeTypeFactory::getAttributeTypeById(new EK_Company_AttributeTypeMapper(), $data['type_id']));
            $oHash->setValueList($data['list_value']);

            try {
                $oHash->insertToDb();
                $this->_redirect('/company/index/parent/' . $this->getRequest()->getParam('parent', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('hash', $oHash);
        $this->view->assign('attributeTypeList', EK_Attribute_AttributeType::getAllInstance(new EK_Company_AttributeTypeMapper()));
    }

    public function editattributehashAction()
    {
        $oHash = EK_Company_Hash::getInstanceById($this->getRequest()->getParam('key'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oHash->setTitle($data['title']);
            $oHash->setType(EK_Attribute_AttributeTypeFactory::getAttributeTypeById(new EK_Company_AttributeTypeMapper(), $data['type_id']));
            $oHash->setValueList($data['list_value']);

            try {
                $oHash->updateToDb();
                $this->_redirect('/company/index/parent/' . $this->getRequest()->getParam('parent', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('hash', $oHash);
        $this->view->assign('attributeTypeList', EK_Attribute_AttributeType::getAllInstance(new EK_Company_AttributeTypeMapper()));
    }

    public function deleteattributehashAction()
    {
        $oHash = EK_Company_Hash::getInstanceById($this->getRequest()->getParam('key'));
        try {
            $oHash->deleteFromDB();
            $this->_redirect('/company/index/parent/' . $this->getRequest()->getParam('parent', 0));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    */

}

