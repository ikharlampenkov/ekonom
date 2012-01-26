<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $o_userManager = TM_User_UserManager::getInstance();
            $o_userManager->setLogin($request->getParam('login'));
            $o_userManager->setPassword($request->getParam('psw'));

            //print_r($o_userManager);

            $auth = Zend_Auth::getInstance();
            $authResult = $auth->authenticate($o_userManager);

            if ($authResult->isValid()) {
                $data = $auth->getStorage()->read();

                $oCompany = EK_Company_Company::getInstanceByUser($data->id);

                if (is_object($oCompany)) {
                    $mainSession = new Zend_Session_Namespace('main');
                    $mainSession->curCity = $oCompany->getCity()->getId();
                    $mainSession->curCompany = $oCompany->getId();
                }

                if ($data->role == 'regional_admin') {
                    $oCity = EK_City_City::getInstanceByUser($data->id);
                    if (is_object($oCity)) {
                        $mainSession = new Zend_Session_Namespace('main');
                        $mainSession->curCity = $oCity->getId();
                    }

                }

                $this->_redirect('/');
            } else {
                $this->view->assign('result', $authResult->getMessages());
                $this->view->assign('login_fail', true);
            }
        }
        $this->_helper->layout->disableLayout();
    }

    public function loginAction()
    {

    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/login');
    }

}

