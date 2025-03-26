<?php
    namespace App\Session\Website;

    class LoginSession{
        private static function init(){
            if(session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
        }

        public static function login($objUser){
            self::init();
            $_SESSION['website']['user'] = [
                'id'            => $objUser->codigo_cliente,
                'nome'          => $objUser->nome_completo,
                'email'         => $objUser->email,
                'permissoes'    => $objUser->permissoes
            ]; 
            return true;  
        }

        public static function isLoged(){
            self::init();
            return isset($_SESSION['website']['user']['id']);
        }

        public static function logout(){
            self::init();
            unset($_SESSION['website']['user']);
            return true;
        }
    }
?>