<?php

class IndexController extends Zend_Controller_Action
{
    protected $_city = 1;

    public function init()
    {
        $mainSession = new Zend_Session_Namespace('main');
        $this->_city = $mainSession->curCity;
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->assign('cityList', EK_City_City::getAllInstance());
        $this->view->assign('companyList', EK_Company_Company::getAllInstance());

        $this->view->assign('productList', EK_Catalog_Product::getAllInstanceFirstPage($this->_city));

        $oPlace = EK_Banner_Place::getInstanceById(1);
        $this->view->assign('bannerList', EK_Banner_PlaceMark::getAllInstance($oPlace));

        $oPlace = EK_Banner_Place::getInstanceById(4);
        $this->view->assign('bannerListRight', EK_Banner_PlaceMark::getAllInstance($oPlace));

        $oPlace = EK_Banner_Place::getInstanceById(5);
        $this->view->assign('bannerListLeft', EK_Banner_PlaceMark::getAllInstance($oPlace));
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

