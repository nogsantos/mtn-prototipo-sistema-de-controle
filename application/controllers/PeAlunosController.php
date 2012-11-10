<?php

class PeAlunosController extends Zend_Controller_Action {

    public function init() {
        /*
         * Define o controller ativo
         */
        $this->view->assign('classActive', 'pessoas');
    }

    public function indexAction() {
        // action body
    }

    public function gridAction() {
        $this->_helper->redirector('index');
    }

}

