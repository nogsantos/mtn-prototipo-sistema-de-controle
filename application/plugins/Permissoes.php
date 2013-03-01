<?php
/**
 * Description of Permissoes
 *
 * @author fabricionogueira
 */
class Permissoes extends Zend_Controller_Plugin_Abstract {

    private static $_instance;
    public $entPesPerm;
    
    public function __construct() {
//        /*
//         * Objeto com o nome do sistema
//         */
//        $this->frontController = Zend_Controller_Front::getInstance();
//        /*
//         * Perfil do usuário
//         * 
//         * Retorna uma string com os itens separados por vírgula com os 
//         * possíveis perfis do usuário para a consulta onde será 
//         * utilizada a cláusua [in('$perfilUsuario')]
//         */
//        require_once '/var/www/zf-tutorial/application/models/PessoasPermissao.php';
//        $this->entPesPerm = new PessoasPermissao();
//        $vPerfil = $this->entPesPerm->getPerfilUsuarioSistema();
//        $sPerfil = '';
//        foreach ($vPerfil as $value) {
//            $sPerfil .= "'".$value['PERFIL']."',";
//        }
//        $this->entPesPerm->perfilUsuario = substr($sPerfil, 0, -1);
    }
    
    public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function getMenuPermissoes() {
        /*
         * Imprime o menu. 
         */
//        $vPerm = $this->entPesPerm->getMenuDinamico();
//        
//        if(is_array($vPerm) && count($vPerm) > 0){
//            /*
//             * separar as funções das categorias
//             */
//            $vMenu = array();
//            foreach ($vPerm as $v) {
//                $vMenu[$v['IN_TIPO']][$v['CONTROLLER']][$v['ID']] = $v;
//            }
//            return $vMenu;
//        }else{
//            return '';
//        }
        return true;
    }
}