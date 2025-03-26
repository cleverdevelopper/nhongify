<?php
    namespace App\Model\WebsiteEntity;
    use App\DatabaseManager\Database;


    class Cliente{
        public $codigo_cliente;
        public $nome_completo;
        public $numero_celular;
        public $email;
        public $numero_identificacao;
        public $palavra_passe;
        public $criado_em;
        public $atualizado_em;
        public $grupos;

        public  function cadastrar(){
            $this->codigo_cliente = (new Database('clientes'))->insert([
                'nome_completo'             =>  $this->nome_completo,
                'numero_celular'            =>  $this->numero_celular,
                'email'                     =>  $this->email,
                'numero_identificacao'      =>  $this->numero_identificacao,
                'palavra_passe'             =>  $this->palavra_passe,
                'criado_em'                 =>  $this->criado_em,
                'atualizado_em'             =>  $this->atualizado_em,
                'grupos'                    =>  $this->grupos
            ]);
            return true;
        }

        public static function getClientes($where = null, $order = null, $limit = null, $fields = "*"){
            return (new Database('Clientes'))->select($where, $order, $limit, $fields);
        }

        public static function getClienteById($id){
            return self::getClientes('codigo_cliente = '.$id)->fetchObject(self::class);
        }

        public  function actualizar(){
            return (new Database('clientes'))->update('codigo_cliente = '.$this->codigo_cliente, [
                'nome_completo'             =>  $this->nome_completo,
                'numero_celular'            =>  $this->numero_celular,
                'email'                     =>  $this->email,
                'numero_identificacao'      =>  $this->numero_identificacao,
                'palavra_passe'             =>  $this->palavra_passe,
                'criado_em'                 =>  $this->criado_em,
                'atualizado_em'             =>  $this->atualizado_em,
                'grupos'                    =>  $this->grupos
            ]);
        }

       /* 
        public  function excluir(){
            return (new Database('pacientes'))->delete('codigo_paciente = '.$this->codigo_paciente);
        }
        */
    }

?>
    