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
        if (isset($_POST['data'])) {
            $o_rubric = new Rubric();
            $o_rubric->setTitle($_POST['data']['title']);
            $o_rubric->setParent($_POST['data']['parent']);
            $o_rubric->insertToDb();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        }

        $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
        $o_smarty->assign('txt', 'Добавить рубрику');
    } elseif ($action == 'edit_rubric' && isset($_GET['id'])) {
        $o_rubric = Rubric::getInstanceById($_GET['id']);

        if (isset($_POST['data'])) {
            $o_rubric->setTitle($_POST['data']['title']);
            $o_rubric->setParent($_POST['data']['parent']);
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
        if (isset($_POST['data'])) {
            $o_product = new Product();
            $o_product->setTitle($_POST['data']['title']);
            $o_product->setRubric($_POST['data']['rubric']);
            $o_product->setShortText($_POST['data']['short_text']);
            $o_product->setFullText($_POST['data']['full_text']);
            $o_product->setPrice($_POST['data']['price']);
            $o_product->insertToDb();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        }

        $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
        $o_smarty->assign('txt', 'Добавить товар');
    } elseif ($action == 'edit_product' && isset($_GET['id'])) {
        $o_product = Product::getInstanceById($_GET['id']);

        if (isset($_POST['data'])) {
            $o_product->setTitle($_POST['data']['title']);
            $o_product->setRubric($_POST['data']['rubric']);
            $o_product->setShortText($_POST['data']['short_text']);
            $o_product->setFullText($_POST['data']['full_text']);
            $o_product->setPrice($_POST['data']['price']);
            $o_product->updateToDb();
            simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
            exit;
        }

        $o_smarty->assign('product', $o_product);
        $o_smarty->assign('rubric_tree', $o_catalog->getRubricTree());
        $o_smarty->assign('txt', 'Редактировать товар');
    } elseif ($action == 'del_product' && isset($_GET['id'])) {
        $o_product = Product::getInstanceById($_GET['id']);
        $o_product->deleteFromDb();
        unset($o_product);
        simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
        exit;
    } elseif ($action == 'del_img' && isset($_GET['id'])) {
        $o_product = Product::getInstanceById($_GET['id']);
        $o_product->deleteImg();
        simo_functions::chLocation('?page=' . $page . '&rubric=' . $cur_rubric->id);
        exit;
    } else {


        $o_smarty->assign('rubric_list', $o_catalog->getAllRubric($cur_rubric->getId()));
        $o_smarty->assign('product_list', $o_catalog->getAllProduct($cur_rubric->getId()));
        $o_smarty->assign('path', $cur_rubric->getPathToRubric());
    }
 */

