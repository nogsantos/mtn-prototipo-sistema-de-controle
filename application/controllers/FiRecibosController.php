<?php

class FiRecibosController extends Zend_Controller_Action {

    public function init() {
        /*
         * Define o controller ativo
         */
        $this->view->assign('classActive', 'financeiro');
        /*
         * Monta o menu principal
         */
        $this->_helper->actionStack('navigator', 'Menu');
    }

    public function indexAction() {
        // action body
    }
}

