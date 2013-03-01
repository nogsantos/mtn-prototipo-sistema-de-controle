<?php

class SeTurmasController extends Zend_Controller_Action {

    public function init() {
        /*
         * Define o controller ativo
         */
        $this->view->assign('classActive', 'seminario');
        /*
         * Monta o menu principal
         */
        $this->_helper->actionStack('navigator', 'Menu');
    }

    public function indexAction() {
        // action body
    }
}