<?php
/**
 * Form Editoras
 */
class Application_Form_Editoras extends Zend_Form {
    /*
     * 
     */
    public function init() {
        $this->setName('bl-editora');
        /*
         */
        $numgEditora = new Zend_Form_Element_Hidden('numg_editora');
        $numgEditora->addFilter('Int');
        /*
         */
        $descNome = new Zend_Form_Element_Text('desc_nome');
        $descNome->setRequired(true)
                 ->addFilter('StripTags')
                 ->addFilter('StringTrim')
                 ->addValidator('NotEmpty');
        /*
         */
        $descEndereco = new Zend_Form_Element_Text('desc_endereco');
        $descEndereco->addFilter('StripTags')
                     ->addFilter('StringTrim');
        /*
         */
        $descObservacao = new Zend_Form_Element_Text('desc_observacoes');
        $descObservacao->addFilter('StripTags')
                       ->addFilter('StringTrim');
        /*
         */
        $this->addElements(
                array(
                    $numgEditora, 
                    $descNome, 
                    $descEndereco,
                    $descObservacao,
                )
        );
    }
}


