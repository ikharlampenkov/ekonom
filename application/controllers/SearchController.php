<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 30.12.11
 * Time: 11:27
 * To change this template use File | Settings | File Templates.
 */
class SearchController extends Zend_Controller_Action
{

    protected $_user = null;

    protected $_city = 1;


    public function init()
    {
        $storage_data = Zend_Auth::getInstance()->getStorage()->read();
        $this->_user = TM_User_User::getInstanceById($storage_data->id);

        $mainSession = new Zend_Session_Namespace('main');
        $this->_city = $mainSession->curCity;
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $oCatalog = new EK_Catalog_ProductCatalog();

        if ($this->getRequest()->getParam('query')) {
            $this->view->assign('productList', $oCatalog->searchProduct($this->getRequest()->getParam('query'), $this->_city));
            $this->view->assign('companyList', EK_Company_Company::search($this->getRequest()->getParam('query'), $this->_city));
            $this->view->assign('rubricList', EK_Catalog_Rubric::search($this->getRequest()->getParam('query')));
            $this->view->assign('query', $this->getRequest()->getParam('query'));
        }

    }

}
