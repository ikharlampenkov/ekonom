<?php

class CatalogController extends Zend_Controller_Action
{
    protected $_user = null;

    protected $_city = 1;

    public function init()
    {
        $storage_data = Zend_Auth::getInstance()->getStorage()->read();
        $this->_user = TM_User_User::getInstanceById($storage_data->id);

        $mainSession = new Zend_Session_Namespace('main');
        $this->_city = $mainSession->curCity;

        $this->_helper->AjaxContext()->addActionContext('viewSubMenu', 'html')->initContext('html');
        $this->_helper->AjaxContext()->addActionContext('viewProduct', 'html')->initContext('html');
        $this->_helper->AjaxContext()->addActionContext('reserve', 'html')->initContext('html');
        $this->_helper->AjaxContext()->addActionContext('share', 'html')->initContext('html');
        $this->_helper->AjaxContext()->addActionContext('addComments', 'html')->initContext('html');
        $this->_helper->AjaxContext()->addActionContext('viewComments', 'html')->initContext('html');
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
        $this->view->assign('productList', $o_catalog->getAllProduct($cur_rubric->getId()));
        $this->view->assign('path', $cur_rubric->getPathToRubric());

        $this->view->assign('attributeTypeList', TM_Attribute_AttributeType::getAllInstance(new EK_Catalog_AttributeTypeMapper()));
        $this->view->assign('attributeHashList', EK_Catalog_Hash::getAllInstance());
    }

    public function viewattributetypeAction()
    {
        $this->view->assign('attributeTypeList', TM_Attribute_AttributeType::getAllInstance(new EK_Catalog_AttributeTypeMapper()));
    }

    public function viewhashAction()
    {
        $this->view->assign('attributeHashList', EK_Catalog_Hash::getAllInstance());
    }

    public function viewsubmenuAction()
    {
        $rub = $this->getRequest()->getParam('rubric', 0);
        $this->view->assign('rubricList', EK_Catalog_Rubric::getAllInstance($rub));
    }

    public function viewproductAction()
    {
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('id'));
        $this->view->assign('product', $oProduct);
        $this->view->assign('galleryList', EK_Gallery_Product::getAllInstance($oProduct));
        $this->view->assign('commentsList', EK_Comments_Product::getAllInstance($oProduct));
    }

    public function reserveAction()
    {
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('id'));
        if ($this->getRequest()->isPost()) {
            $reserve = $this->getRequest()->getParam('reserve');
            try {
                //echo $oProduct->getCompany()->getOrderEmail();
                $oProduct->reserve($reserve);
                exit;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        $this->view->assign('product', $oProduct);
    }

    public function shareAction()
    {
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('id'));
        if ($this->getRequest()->isPost()) {
            $share = $this->getRequest()->getParam('share');
            try {
                $message = 'Приглашение от друга: ' . "\r\n";
                $message .= 'Дата: ' . date('d.m.Y') . "\r\n" .
                        'Имя: ' . $share['name'] . "\r\n" .
                        'Комментарий: ' . $share['text'];

                if ($share['email'] != '') {
                    mail($share['email'], 'Приглашение от друга', $message);
                }
                exit;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        $this->view->assign('product', $oProduct);

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
        $this->view->assign('companyList', EK_Company_Company::getAllInstance($this->_city));

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
        $this->view->assign('companyList', EK_Company_Company::getAllInstance($this->_city));
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
                $this->_redirect('/catalog/viewAttributeType/');
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
                $this->_redirect('/catalog/viewAttributeType/');
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
            $this->_redirect('/catalog/viewAttributeType/');
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
                $this->_redirect('/catalog/viewAttributeHash/');
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
                $this->_redirect('/catalog/viewAttributeHash/');
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
            $this->_redirect('/catalog/viewAttributeHash/');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public function viewgalleryAction()
    {
        $cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('idProduct'));
        $this->view->assign('galleryList', EK_Gallery_Product::getAllInstance($oProduct));
        $this->view->assign('product', $oProduct);
        $this->view->assign('cur_rubric', $cur_rubric);
    }

    public function addgalleryAction()
    {
        $cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('idProduct'));

        $oGallery = new EK_Gallery_Product();
        $oGallery->setUser($this->_user);
        $oGallery->setDateCreate(date('d.m.Y H:i:s'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oGallery->setTitle($data['title']);

            try {
                $oGallery->insertToDb($oProduct);
                $this->_redirect('/catalog/viewGallery/idProduct/' . $this->getRequest()->getParam('idProduct') . '/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('gallery', $oGallery);
        $this->view->assign('company', $oProduct);
        $this->view->assign('cur_rubric', $cur_rubric);
    }

    public function editgalleryAction()
    {
        $cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('idProduct'));
        $oGallery = EK_Gallery_Product::getInstanceById($this->getRequest()->getParam('id'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oGallery->setTitle($data['title']);

            try {
                $oGallery->updateToDb();
                $this->_redirect('/catalog/viewGallery/idProduct/' . $this->getRequest()->getParam('idProduct') . '/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('gallery', $oGallery);
        $this->view->assign('company', $oProduct);
        $this->view->assign('cur_rubric', $cur_rubric);
    }

    public function deletegalleryAction()
    {
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('idProduct'));
        $oGallery = EK_Gallery_Product::getInstanceById($this->getRequest()->getParam('id'));

        try {
            $oGallery->deleteFromDB($oProduct);
            $this->_redirect('/catalog/viewGallery/idProduct/' . $this->getRequest()->getParam('idProduct') . '/rubric/' . $this->getRequest()->getParam('rubric', 0));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function viewcommentsAction()
    {
        $cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('idProduct'));

        $this->view->assign('commentsList', EK_Comments_Product::getAllInstance($oProduct));
        $this->view->assign('company', $oProduct);
        $this->view->assign('cur_rubric', $cur_rubric);
    }

    public function addcommentsAction()
    {
        //$cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oProduct = EK_Catalog_Product::getInstanceById($this->getRequest()->getParam('idProduct'));

        $oComments = new EK_Comments_Product();
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('comment');
            $oComments->setDateCreate(date('Y-m-d'));
            $oComments->setUser($data['name']);
            $oComments->setMessage($data['text']);


            try {
                $oComments->insertToDb($oProduct);
                exit;
                //$this->_redirect('/catalog/viewGallery/idProduct/' . $this->getRequest()->getParam('idProduct') . '/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('product', $oProduct);
        //$this->view->assign('cur_rubric', $cur_rubric);
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

