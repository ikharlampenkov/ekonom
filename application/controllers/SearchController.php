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
        $o_catalog = new EK_Catalog_ProductCatalog();
        $rub = $this->getRequest()->getParam('rubric', 0);

        if ($rub != 0) {
            $cur_rubric = EK_Catalog_Rubric::getInstanceById($rub);
        } else {
            $cur_rubric = EK_Catalog_Rubric::getRootRubric();
        }

        $this->view->assign('cur_rubric', $cur_rubric);

        $this->view->assign('rubric_list', EK_Catalog_Rubric::getAllInstance($cur_rubric->getId()));
        $this->view->assign('productList', EK_Catalog_Product::getAllInstance($cur_rubric->getId(), $this->_city));
        $this->view->assign('path', $cur_rubric->getPathToRubric());

        $this->view->assign('attributeTypeList', TM_Attribute_AttributeType::getAllInstance(new EK_Catalog_AttributeTypeMapper()));
        $this->view->assign('attributeHashList', EK_Catalog_Hash::getAllInstance());
    }

}
