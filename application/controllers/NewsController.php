<?php

class NewsController extends Zend_Controller_Action
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
            $dataNews = $this->getRequest()->getParam('data');

            $oContentPage = EK_Share_ContentPage::getInstanceByTitle('news');
            $oContentPage->setContent($dataNews['content']);

            try {
                $oContentPage->updateToDb();
                $this->_redirect('/news/');
            } catch (Exception $e) {
                $this->view->assign('exception_msg', $e->getMessage());
            }

        }

        $oNews = EK_Share_ContentPage::getInstanceByTitle('news');

        $this->view->assign('contentNews', $oNews);
        $this->view->assign('ckeditorNews', $CKEditor->editor('data[content]', $oNews->getContent()));
    }


}

