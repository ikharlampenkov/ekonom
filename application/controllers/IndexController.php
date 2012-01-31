<?php

class IndexController extends Zend_Controller_Action
{
    protected $_city = 1;

    public function init()
    {
        $mainSession = new Zend_Session_Namespace('main');
        $this->_city = $mainSession->curCity;

        $this->_helper->AjaxContext()->addActionContext('showProductList', 'html')->initContext('html');
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->assign('cityList', EK_City_City::getAllInstance());
        $this->view->assign('companyList', EK_Company_Company::getAllInstance());

        $this->view->assign('productList', EK_Catalog_Product::getAllInstanceFirstPage($this->_city, 0));
        $this->view->assign('pagerCount', EK_Catalog_Product::getFirstPageCount($this->_city));
        $this->view->assign('curPager', 0);

        $oPlace = EK_Banner_Place::getInstanceById(1);
        $this->view->assign('bannerList', EK_Banner_PlaceMark::getAllInstance($oPlace));
        $this->view->assign('mainPlace', $oPlace);

        $oPlace = EK_Banner_Place::getInstanceById(4);
        $this->view->assign('bannerListRight', EK_Banner_PlaceMark::getAllInstance($oPlace));
        $this->view->assign('rightPlace', $oPlace);

        $oPlace = EK_Banner_Place::getInstanceById(5);
        $this->view->assign('bannerListLeft', EK_Banner_PlaceMark::getAllInstance($oPlace));
        $this->view->assign('leftPlace', $oPlace);
    }

    public function showproductlistAction()
    {
        $start = $this->getRequest()->getParam('pager', 0);
        $this->view->assign('productList', EK_Catalog_Product::getAllInstanceFirstPage($this->_city, $start * EK_Catalog_Product::PRODUCT_PER_PAGE));
        $this->view->assign('pagerCount', EK_Catalog_Product::getFirstPageCount($this->_city));
        $this->view->assign('curPager', $start);
    }

    public function choosecityAction()
    {
        if ($this->getRequest()->isPost()) {
            $mainSession = new Zend_Session_Namespace('main');
            $mainSession->curCity = $this->getRequest()->getParam('city_name', 1);

            $this->_redirect('/');
        }
    }


}

