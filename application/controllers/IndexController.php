<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        
    }

    /**
     * Redirecionamento para a p�gina inicial do formul�rio
     */
    public function gridAction() {
        $this->_helper->redirector('index');
    }
}

