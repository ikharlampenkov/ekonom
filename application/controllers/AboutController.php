<?php

class AboutController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            $dataAbout = $this->getRequest()->getParam('data_about');
            $dataContacts = $this->getRequest()->getParam('data_contacts');

            $oContentPageAbout = EK_Share_ContentPage::getInstanceByTitle('about');
            $oContentPageAbout->setContent($dataAbout['content']);

            $oContentPageContacts = EK_Share_ContentPage::getInstanceByTitle('contacts');
            $oContentPageContacts->setContent($dataContacts['content']);

            try {
                $oContentPageAbout->updateToDb();
                $oContentPageContacts->updateTODB();
                $this->_redirect('/about/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }


        $this->view->assign('contentAbout', EK_Share_ContentPage::getInstanceByTitle('about'));
        $this->view->assign('contentContacts', EK_Share_ContentPage::getInstanceByTitle('contacts'));
    }


}

