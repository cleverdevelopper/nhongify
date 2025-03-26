<?php
    namespace App\Model\WebsiteEntity;
    use App\DatabaseManager\Database;

    class ClienteUser{
        public $codigo_cliente;
        public $nome_completo;
        public $email;
        public $palavra_passe;

        public  function cadastrar(){
            $this->codigo_cliente = (new Database('cliente_users'))->insert([
                'nome_completo'          =>  $this->nome_completo,
                'email'                  =>  $this->email,
                'palavra_passe'          =>  $this->palavra_passe
            ]);

            return true;
        }

        public  function actualizar(){
            return (new Database('cliente_users'))->update('codigo_cliente = '.$this->codigo_cliente, [
                'nome_completo'          =>  $this->nome_completo,
                'email'                  =>  $this->email,
                'palavra_passe'          =>  $this->palavra_passe
            ]);
        }
        
        public static function getUserByutilizador($email){
            return (new Database('cliente_users')) -> select('email = "'.$email.'"')->fetchObject(self::class);
        }

        public static function getUsers($where = null, $order = null, $limit = null, $fields = "*"){
            return (new Database('cliente_users'))->select($where, $order, $limit, $fields);
        }

        public static function getUserById($id){
            return self::getUsers('codigo_cliente = '.$id)->fetchObject(self::class);
        }
    }
?>