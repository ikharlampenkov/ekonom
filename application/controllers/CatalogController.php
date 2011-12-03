<?php

class CatalogController extends Zend_Controller_Action
{

    public function init()
    {

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
    }

    public function addAction()
    {
        $cur_rubric = EK_Catalog_Rubric::getInstanceById($this->getRequest()->getParam('rubric', 0));
        $oProduct = new EK_Catalog_Product();
        $oProduct->setRubric($cur_rubric);


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');

            $oProduct->setTitle($data['title']);
            $oProduct->setRubric(EK_Catalog_Rubric::getInstanceById($data['rubric']));
            $oProduct->setShortText($data['short_text']);
            $oProduct->setFullText($data['full_text']);
            $oProduct->setPrice($data['price']);

            try {
                $oProduct->insertToDb();
                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }
        }

        $this->view->assign('rubric_tree', EK_Catalog_Rubric::getRubricTree());
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
            $oProduct->setShortText($data['short_text']);
            $oProduct->setFullText($data['full_text']);
            $oProduct->setPrice($data['price']);

            try {
                $oProduct->updateToDb();
                $this->_redirect('/catalog/index/rubric/' . $this->getRequest()->getParam('rubric', 0));
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }
        }

        $this->view->assign('rubric_tree', EK_Catalog_Rubric::getRubricTree());
        $this->view->assign('product', $oProduct);
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
                $oRubric->setParent(EK_Catalog_Rubric::getInstanceById($data['rubric']));

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

}

/*
 *

    if (isset($_GET['rubric'])) {
        $cur_rubric = Rubric::getInstanceById($_GET['rubric']);
    } else {
        $cur_rubric = Rubric::getRootRubric();
    }

    $o_smarty->assign('cur_rubric', $cur_rubric);

    if ($action == 'add_rubric') {
        if (isset($data)) {
            $o_rubric = new Rubric();
            $o_rubric->setTitle($data['title']);
            $o_rubric->setParent($data['parent']);
            $o_rubric->insertToDb();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        }

        $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
        $o_smarty->assign('txt', 'Добавить рубрику');
    } elseif ($action == 'edit_rubric' && isset($_GET['id'])) {
        $o_rubric = Rubric::getInstanceById($_GET['id']);

        if (isset($data)) {
            $o_rubric->setTitle($data['title']);
            $o_rubric->setParent($data['parent']);
            $o_rubric->updateToDb();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        }

        $o_smarty->assign('rubric', $o_rubric);
        $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
        $o_smarty->assign('txt', 'Редактировать рубрику');
    } elseif ($action == 'del_rubric' && isset($_GET['id'])) {
        $o_rubric = Rubric::getInstanceById($_GET['id']);
        $o_rubric->deleteFromDb();
        unset($o_rubric);
        simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
        exit;
    } elseif ($action == 'add_product') {
        if (isset($data)) {
            $oProduct = new EK_Catalog_Product();
            $oProduct->setTitle($data['title']);
            $oProduct->setRubric($data['rubric']);
            $oProduct->setShortText($data['short_text']);
            $oProduct->setFullText($data['full_text']);
            $oProduct->setPrice($data['price']);
            $oProduct->insertToDb();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        }

        $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
        $o_smarty->assign('txt', 'Добавить товар');
    } elseif ($action == 'edit_product' && isset($_GET['id'])) {
        $oProduct = EK_Catalog_Product::getInstanceById($_GET['id']);

        if (isset($data)) {
            $oProduct->setTitle($data['title']);
            $oProduct->setRubric($data['rubric']);
            $oProduct->setShortText($data['short_text']);
            $oProduct->setFullText($data['full_text']);
            $oProduct->setPrice($data['price']);
            $oProduct->updateToDb();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        }

        $o_smarty->assign('product', $oProduct);
        $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
        $o_smarty->assign('txt', 'Редактировать товар');
    } elseif ($action == 'del_product' && isset($_GET['id'])) {
        $oProduct = EK_Catalog_Product::getInstanceById($_GET['id']);
        $oProduct->deleteFromDb();
        unset($oProduct);
        simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
        exit;
    } elseif ($action == 'del_img' && isset($_GET['id'])) {
        $oProduct = EK_Catalog_Product::getInstanceById($_GET['id']);
        $oProduct->deleteImg();
        simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
        exit;
    } else {


        $o_smarty->assign('rubric_list', $o_catalog->getAllRubric($cur_rubric->getId()));
        $o_smarty->assign('product_list', $o_catalog->getAllProduct($cur_rubric->getId()));
        $o_smarty->assign('path', $cur_rubric->getPathToRubric());
    }
 */

