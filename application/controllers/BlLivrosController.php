<?php

class BlLivrosController extends Zend_Controller_Action {

    public function init() {
        /*
         * Define o controller ativo
         */
        $this->view->assign('classActive', 'biblioteca');
    }

    public function indexAction() {
        // action body
    }
    /**
     * Redirecionamento para a p�gina inicial do formul�rio
     */
    public function gridAction() {
        $this->_helper->redirector('index');
    }
}

