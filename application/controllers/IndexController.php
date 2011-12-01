<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->assign('cityList', EK_City_City::getAllInstance());
        $this->view->assign('companyList', EK_Company_Company::getAllInstance());
    }


}

