<?php

class ContentpageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->assign('contentPageList', EK_Share_ContentPage::getAllInstance());
    }

    public function addAction()
    {

        include_once Zend_Registry::get('production')->editor->path . 'ckeditor/ckeditor.php';
        include_once Zend_Registry::get('production')->editor->path . 'ckfinder/ckfinder.php';

        $CKEditor = new CKEditor();
        $CKEditor->basePath = '/ckeditor/';
        $CKEditor->returnOutput = true;

        $ckFinder = new CKFinder();
        $ckFinder->BasePath = '/ckfinder/';
        $ckFinder->SetupCKEditorObject($CKEditor);


        $oContentPage = new EK_Share_ContentPage();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oContentPage->setPageTitle($data['page_title']);
            $oContentPage->setTitle($data['title']);
            $oContentPage->setContent($data['content']);

            try {
                $oContentPage->insertToDb();
                $this->_redirect('/contentPage/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('ckeditor', $CKEditor->editor('data[content]', $oContentPage->getContent()));
        $this->view->assign('contentPage', $oContentPage);
    }

    public function editAction()
    {
        include_once Zend_Registry::get('production')->editor->path . 'ckeditor/ckeditor.php';
        include_once Zend_Registry::get('production')->editor->path . 'ckfinder/ckfinder.php';

        $CKEditor = new CKEditor();
        $CKEditor->basePath = '/ckeditor/';
        $CKEditor->returnOutput = true;

        $ckFinder = new CKFinder();
        $ckFinder->BasePath = '/ckfinder/';
        $ckFinder->SetupCKEditorObject($CKEditor);

        $oContentPage = EK_Share_ContentPage::getInstanceByTitle($this->getRequest()->getParam('title'));

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParam('data');
            $oContentPage->setTitle($data['title']);
            $oContentPage->setContent($data['content']);

            try {
                $oContentPage->updateToDb();
                $this->_redirect('/contentPage/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $this->view->assign('ckeditor', $CKEditor->editor('data[content]', $oContentPage->getContent()));
        $this->view->assign('contentPage', $oContentPage);
    }

    public function deleteAction()
    {
        $oContentPage = EK_Share_ContentPage::getInstanceByTitle($this->getRequest()->getParam('title'));
        try {
            $oContentPage->deleteFromDB();
            $this->_redirect('/contentPage/');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());

        }
    }


}

