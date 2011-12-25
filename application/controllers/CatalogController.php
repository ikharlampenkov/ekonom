<?php

class CatalogController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->AjaxContext()->addActionContext('viewSubMenu', 'html')->initContext('html');
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $o_catalog = new EK_Catalog_ProductCatalog();
        $rub = $this->getRequest()->getParam('rubric', 0);

        if ($rub != 0) {
            $cur_rubric = EK_Catalog_Rubric::getInstanceById($rub);
        } else {
            $cur_rubric = EK_Catalog_Rubric::getRootRubric();
        }

        $this->view->assign('cur_rubric', $cur_rubric);

        $this->view->assign('rubric_list', $o_catalog->getAllRubric($cur_rubric->getId()));
        $this->view->assign('product_list', $o_catalog->getAllProduct($cur_rubric->getId()));
        $this->view->assign('path', $cur_rubric->getPathToRubric());

        $this->view->assign('attributeTypeList', TM_Attribute_AttributeType::getAllInstance(new EK_Catalog_AttributeTypeMapper()));
        $this->view->assign('attributeHashList', EK_Catalog_Hash::getAllInstance());
    }

    public function viewsubmenuAction()
    {
        $rub = $this->getRequest()->getParam('rubric', 0);
        $this->view->assign('rubricList', EK_Catalog_Rubric::getAllInstance($rub));
    }

    public function addAction()
    {
        $cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oProduct = new EK_Catalog_Product();
        $oProduct->setRubric($cur_rubric);
        $oProduct->setCompany(EK_Company_Company::getInstanceById(1));


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oProduct->setTitle($data['title']);
            $oProduct->setRubric(EK_Catalog_Rubric::getInstanceById($data['rubric']));
            $oProduct->setCompany(EK_Company_Company::getInstanceById($data['company']));
            $oProduct->setShortText($data['short_text']);
            $oProduct->setFullText($data['full_text']);
            $oProduct->setPrice($data['price']);

            try {
                $oProduct->insertToDb();

                foreach ($data['attribute'] as $key => $value) {
                    $oProduct->setAttribute($key, $value);
                }
                $oProduct->updateToDb();

                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }
        }

        $this->view->assign('rubric_tree', EK_Catalog_Rubric::getRubricTree());
        $this->view->assign('companyList', EK_Company_Company::getAllInstance());
        $this->view->assign('attributeHashList', EK_Catalog_Hash::getAllInstance());
        $this->view->assign('product', $oProduct);
        $this->view->assign('cur_rubric', $cur_rubric);
    }

    public function editAction()
    {
        $cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oProduct->setTitle($data['title']);
            $oProduct->setRubric(EK_Catalog_Rubric::getInstanceById($data['rubric']));
            $oProduct->setCompany(EK_Company_Company::getInstanceById($data['company']));
            $oProduct->setShortText($data['short_text']);
            $oProduct->setFullText($data['full_text']);
            $oProduct->setPrice($data['price']);

            foreach ($data['attribute'] as $key => $value) {
                $oProduct->setAttribute($key, $value);
            }

            try {
                $oProduct->updateToDb();
                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }
        }

        $this->view->assign('rubric_tree', EK_Catalog_Rubric::getRubricTree());
        $this->view->assign('companyList', EK_Company_Company::getAllInstance());
        $this->view->assign('product', $oProduct);
        $this->view->assign('attributeHashList', EK_Catalog_Hash::getAllInstance($oProduct));
        $this->view->assign('cur_rubric', $cur_rubric);
    }

    public function deleteAction()
    {
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('id'));
        try {
            $oProduct->deleteFromDb();
            $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
        } catch (Exception $e) {
            $this->view->assign('exception_msg', $e->getMessage());
        }

    }

    public function addrubricAction()
    {
        $cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oRubric = new EK_Catalog_Rubric();
        $oRubric->setParent($cur_rubric);


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oRubric->setTitle($data['title']);
            $oRubric->setParent(EK_Catalog_Rubric::getInstanceById($data['parent']));

            try {
                $oRubric->insertToDb();
                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }
        }

        $this->view->assign('rubric_tree', EK_Catalog_Rubric::getRubricTree());
        $this->view->assign('rubric', $oRubric);
        $this->view->assign('cur_rubric', $cur_rubric);
    }

    public function editrubricAction()
    {
        $cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oRubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oRubric->setTitle($data['title']);
            $oRubric->setParent(EK_Catalog_Rubric::getInstanceById($data['parent']));

            try {
                $oRubric->updateToDb();
                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }
        }

        $this->view->assign('rubric_tree', EK_Catalog_Rubric::getRubricTree());
        $this->view->assign('rubric', $oRubric);
        $this->view->assign('cur_rubric', $cur_rubric);
    }

    public function deleterubricAction()
    {
        $oRubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('id'));
        try {
            $oRubric->deleteFromDb();
            $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
        } catch (Exception $e) {
            $this->view->assign('exception_msg', $e->getMessage());
        }

    }

    public function addattributetypeAction()
    {
        $oType = new TM_Attribute_AttributeType(new EK_Catalog_AttributeTypeMapper());

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oType->setTitle($data['title']);
            $oType->setDescription($data['description']);
            $oType->setHandler($data['handler']);

            try {
                $oType->insertToDb();
                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('type', $oType);
    }

    public function editattributetypeAction()
    {
        $oType = TM_Attribute_AttributeTypeFactory::getAttributeTypeById(new EK_Catalog_AttributeTypeMapper(), $this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oType->setTitle($data['title']);
            $oType->setDescription($data['description']);
            $oType->setHandler($data['handler']);

            try {
                $oType->updateToDb();
                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('type', $oType);
    }

    public function deleteattributetypeAction()
    {
        $oType = TM_Attribute_AttributeTypeFactory::getAttributeTypeById(new EK_Catalog_AttributeTypeMapper(), $this->getRequest()->getParam('id'));
        try {
            $oType->deleteFromDB();
            $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function addattributehashAction()
    {
        $oHash = new EK_Catalog_Hash();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oHash->setAttributeKey($data['attribute_key']);
            $oHash->setTitle($data['title']);
            $oHash->setType(TM_Attribute_AttributeTypeFactory::getAttributeTypeById(new EK_Catalog_AttributeTypeMapper(), $data['type_id']));
            $oHash->setValueList($data['list_value']);

            try {
                $oHash->insertToDb();
                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('hash', $oHash);
        $this->view->assign('attributeTypeList', TM_Attribute_AttributeType::getAllInstance(new EK_Catalog_AttributeTypeMapper()));
    }

    public function editattributehashAction()
    {
        $oHash = EK_Catalog_Hash::getInstanceById($this->getRequest()->getParam('key'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oHash->setTitle($data['title']);
            $oHash->setType(TM_Attribute_AttributeTypeFactory::getAttributeTypeById(new EK_Catalog_AttributeTypeMapper(), $data['type_id']));
            $oHash->setValueList($data['list_value']);

            try {
                $oHash->updateToDb();
                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('hash', $oHash);
        $this->view->assign('attributeTypeList', TM_Attribute_AttributeType::getAllInstance(new EK_Catalog_AttributeTypeMapper()));
    }

    public function deleteattributehashAction()
    {
        $oHash = EK_Catalog_Hash::getInstanceById($this->getRequest()->getParam('key'));
        try {
            $oHash->deleteFromDB();
            $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

/*
 *


    if ($action == 'del_img' && isset($_GET['id'])) {
        $oProduct = EK_Catalog_Product::getInstanceById($_GET['id']);
        $oProduct->deleteImg();
        simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
        exit;
    } 
 */

