<?php
    namespace App\Alert;
    use App\Utils\ViewManager;

    class Alert{
        public static function getSuccess($message){
            return ViewManager::render('alert/status', [
                'titulo'    => 'Sucesso',
                'tipo'      => 'success',
                'mensagem'  => $message
            ]);
        }

        public static function getError($message){
            return ViewManager::render('alert/status', [
                'titulo'    => 'Erro',
                'tipo'      => 'error',
                'mensagem'  => $message
            ]);
        }
    }

?>