<?php

class AboutController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        include_once Zend_Registry::get('production')->editor->path . 'ckeditor/ckeditor.php';
        include_once Zend_Registry::get('production')->editor->path . 'ckfinder/ckfinder.php';

        $CKEditor = new CKEditor();
        $CKEditor->basePath = '/ckeditor/';
        $CKEditor->returnOutput = true;

        $ckFinder = new CKFinder();
        $ckFinder->BasePath = '/ckfinder/';
        $ckFinder->SetupCKEditorObject($CKEditor);


        if ($this->getRequest()->isPost()) {
            $dataAbout = $this->getRequest()->getParam('dataabout');
            $dataContacts = $this->getRequest()->getParam('datacontacts');

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

        $oAbout = EK_Share_ContentPage::getInstanceByTitle('about');
        $oContacts = EK_Share_ContentPage::getInstanceByTitle('contacts');

        $this->view->assign('contentAbout', $oAbout);
        $this->view->assign('ckeditorAbout', $CKEditor->editor('dataabout[content]', $oAbout->getContent()));
        $this->view->assign('contentContacts', $oContacts);
        $this->view->assign('ckeditorContacts', $CKEditor->editor('datacontacts[content]', $oContacts->getContent()));
    }


}

