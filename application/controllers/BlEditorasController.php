<?php
/**
 * Controller Editoras
 */
class BlEditorasController extends Zend_Controller_Action {

    public function init() {
        /*
         * Define o controller ativo
         */
        $this->view->assign('classActive', 'biblioteca');
        /*
         * Mensagem para o formulário
         */
        $this->view->menssagens = $this->_helper->flashMessenger->getMessages();
    }

    public function indexAction() {
        /*
         * Listando os dados da editora no formulário;
         */
        $oEditoras = new Application_Model_DbTable_Editoras();
        if($oEditoras->getAllEditoras()){
            $this->view->editoras = $oEditoras->fetchAll(null,'numg_editora desc');
        }else{
            $this->view->editoras = '';
        }
        
    }
    /**
     * Cadastrar
     */
    public function cadastrarAction(){
        $form = new Application_Form_Editoras();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $descNome = $form->getValue('desc_nome');
                $descEndereco = $form->getValue('desc_endereco');
                $descObservacao = $form->getValue('desc_observacoes');
                $oEditoras = new Application_Model_DbTable_Editoras();
                $oEditoras->cadastrarEditora($descNome, $descEndereco, $descObservacao);
                
                $this->_helper->flashMessenger->addMessage(utf8_encode('Cadastro realizado com sucesso!'));
            } else {
                $form->populate($formData);
            }
            $this->_helper->redirector('index');
        }
    }
    /**
     * Editar
     */
    public function editarAction(){
        $form = new Application_Form_Editoras();
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $numg_editora = (int) $form->getValue('numg_editora');
                $descNome = $form->getValue('desc_nome');
                $descEndereco = $form->getValue('desc_endereco');
                $descObservacoes = $form->getValue('desc_observacoes');
                $oEditora = new Application_Model_DbTable_Editoras();
                $oEditora->editarEditora($numg_editora, $descNome, $descEndereco, $descObservacoes);
                    
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $numg_editora = $this->_getParam('numg_editora', 0);
            if ($numg_editora > 0) {
                $oEditora = new Application_Model_DbTable_Editoras();
                $this->view->oEditora = $oEditora->getEditoras($numg_editora);
            }
        }
    }
    /**
     * Excluir
     */
    public function deletarAction(){
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('action');
            if ($del == 'Excluir') {
                $numgEditora = $this->getRequest()->getPost('numg_editora');
                $oEditora = new Application_Model_DbTable_Editoras();
                $oEditora->deletarEditora($numgEditora);
                $this->_helper->flashMessenger->addMessage(utf8_encode('Exclusão realizada com sucesso!'));
            }
            $this->_helper->redirector('index');
        } else {
            $numgEditora = $this->_getParam('numg_editora', 0);
            $oEditora = new Application_Model_DbTable_Editoras();
            $this->view->oEditora = $oEditora->getEditoras($numgEditora);
        }
    }
    /**
     * Imprimir Visualização na tela
     */
    public function imprimirAction(){
        $oEditoras = new Application_Model_DbTable_Editoras();
        $resEditoras = $oEditoras->fetchAll(null,'numg_editora desc');
        
        if(count($resEditoras) > 0){
            require_once 'Zend/Pdf.php';
            //cria objeto
            $pdf = new Zend_Pdf();
           /* Cria uma nova página pdf, neste caso define tamanho de folha A4
            * Poderíamos usar da seguinte maneira: $pdf->newPage($x, $y) tamanho em px
            * exemplo: $pdf->newPage('500', '500');
            * A4 modo paisagem = SIZE_A4_LANDSCAPE
            */
            $pdfPage = $pdf->newPage(Zend_Pdf_Page::SIZE_A4);
            // Busca uma fonte para usarmos, neste caso: courier, poderíamos usar _VERDANA, etc...
            $font = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA);
            // Aplica fonte
            $pdfPage->setFont($font, 12);
           /*
            * Como o próprio nome diz: escreve o texto;
            * os principais parâmetros dessa função são: (texto, posx, posy, encoding);
            * no meu caso, encodei para UTF-8, pois os dados que estou escrevendo também
            * estão nesse o formato.
            * Caso você tenha problemas com acentuação, retire esta propriedade
            */
            $stringpos = 780; // posicao x do meu texto
            $stringdif = 12; // diferença entre cada quebra de linha.
            $pdfPage->drawText('Editoras',5, 800,'UTF-8');
            for($i=0;$i<count($resEditoras);$i++){
                $pdfPage->drawText($resEditoras->desc_nome, 260, $stringpos, 'UTF-8');
                $stringpos = ($stringpos-$stringdif); //subtrai para que a linha fique embaixo
            }
            // adicionamos nossa página como a 1ª página de nosso documento
            $pdf->pages[0]= $pdfPage;
            //Salvamos o documento Obs.: requer permissão para escrita na pasta (CHMOD);
    //        $pdf->save('exemplo.pdf');
            //Por fim, setamos a header como um PDF, e renderizamos o nosso $pdf;
            header('Content-type: application/pdf');
            echo $pdf->render(); 
        }
    }
    /**
     * Exportar
     */
    public function exportarAction(){
        
    }
    /**
     * Redirecionamento para a página inicial do formulário
     */
    public function gridAction() {
        $this->_helper->redirector('index');
    }
}

