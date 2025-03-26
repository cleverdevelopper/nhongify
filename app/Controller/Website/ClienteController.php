<?php
    namespace App\Controller\Website;
    use App\Controller\Website\PageController;
    use App\Utils\ViewManager;
    use App\DatabaseManager\Pagination;
    use App\Model\WebsiteEntity\Cliente;
    use \App\Session\Website\LoginSession as  SessionWebsiteLogin;
    use App\Alert\Alert;
    

    class ClienteController extends PageController{

        #=========================================================
        # Mensagem de erro e sucesso
        #=========================================================
        private static function getStatus($request){
            $queryParams = $request->getQueryParams();
            
            if(!isset($queryParams['status'])) return '';

            switch($queryParams['status']){
                case 'created':
                    return Alert::getSuccess('Cliente cadastrado com sucesso.');
                    break;
                case 'updated':
                    return Alert::getSuccess('Cliente actualizada com sucesso.');
                    break;
                case 'deleted':
                    return Alert::getSuccess('Cliente excluido com sucesso.');
                    break;
                case 'wrong':
                    return Alert::getError('A palavra passe nao conscide');
                    break;
            }
        } 



        public static function getNewCliente($request){
            $content = ViewManager::render('website/registar',[
                'nome_completo'             => '',
                'numero_celular'            => '',
                'email'                     => '',
                'numero_identificacao'      => '',
                'palavra_passe'             => '',
                'status'                    => self::getStatus($request)
            ]);
    
            return parent::getPage('Criar Conta | Nhongify', $content);    
        }

        public static function setNewCliente($request){
            $postVars = $request->getPostVars();

            if ($postVars['text_palavra_passe'] != $postVars['text_palavra_passe_repeat']){
                $request->getRouter()->redirect('/signup?status=wrong');
            }

            $objCliente = new Cliente;
            $objCliente->nome_completo          = $postVars['text_nome_completo'];
            $objCliente->numero_celular         = $postVars['text_numero_celular'];
            $objCliente->email                  = $postVars['text_email'];
            $objCliente->numero_identificacao   = $postVars['text_bi'];
            $objCliente->palavra_passe          = md5($postVars['text_palavra_passe']);
            $objCliente->grupos                 = $postVars['text_grupos'];

            #============================================================
            #   Arraque de seccao para o cliente
            #============================================================
            if($objCliente->cadastrar() == true){
                SessionWebsiteLogin::login($objCliente);
                $request->getRouter()->redirect('/home?status=created');
            }else{
                $request->getRouter()->redirect('/signup?status=wrong');
            }
            #============================================================
        }

    }

?>