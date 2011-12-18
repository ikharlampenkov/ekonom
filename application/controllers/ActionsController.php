<?php

class ActionsController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->AjaxContext()->addActionContext('view', 'html')->initContext('html');
    }

    public function indexAction()
    {
        // action body
    }

    public function viewAction()
    {

    }


}

