<?php

class FiRecibosController extends Zend_Controller_Action {

    public function init() {
        /*
         * Define o controller ativo
         */
        $this->view->assign('classActive', 'financeiro');
    }

    public function indexAction() {
        // action body
    }
    /**
     * Redirecionamento para a página inicial do formulário
     */
    public function gridAction() {
        $this->_helper->redirector('index');
    }
}

