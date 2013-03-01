<?php
/**
 * Description of PessoasPermissao
 *
 * @author fabricionogueira
 */
class PessoasPermissao extends Zend_DB_Table_Abstract {
    /**
     * Obtem o perfil do usuário por sistema.
     * 
     * @author Fabricio Nogueira <fabricionogueira@cercomp.ufg.br>
     * @since 22 DEZ 2012
     * @return Array 
     * @param Int $cd_pessoa Codigo do usuário
     */
    public function getPerfilUsuarioSistema(){
        return true;
    }
    /**
     * Método usado para retornar a cunsulta que gera o menu dinâmico
     * 
     * @author Fabricio Nogueira <fabricionogueira@cercomp.ufg.br>
     * @since 10 JAN 2013
     * @return Array 
     * @param String $perfilUsuario
     * @param Int $cd_pessoa
     * @param String $nomeSistema
     */
    public function getMenuDinamico(){
        return true;
    }
}