<?php
    namespace App\Controller\Website;
    use App\Model\WebsiteEntity\ClienteUser as Utilizador;
    use App\Utils\ViewManager;
    use \App\Session\Website\LoginSession as  SessionWebsiteLogin;
    use App\Alert\Alert;

    class LoginController extends PageController{
        public static function getLoginPage($request, $errorMessage = null){
            $status = !is_null($errorMessage) ? Alert::getError($errorMessage) : '';

            $content = ViewManager::render('website/login', [
                'status'  => $status
            ]);

            return parent::getPage('Entrar | Nhongify', $content);
        }
        
        public static function setLoginPage($request){
            $postVars   = $request->getPostVars();

            $utilizador = $postVars['text_username'] ?? '';
            $password   = $postVars['text_password'] ?? '';

            $objUtilizador = Utilizador::getUserByutilizador($utilizador);

            if(empty($objUtilizador)){
                return self::getLoginPage($request, 'Dados de login invalidos.' );
            }

            if(md5($password) != $objUtilizador->palavra_passe){

                return self::getLoginPage($request, 'Dados de login invalidos.' );
            }

            SessionWebsiteLogin::login($objUtilizador);
            
            $request->getRouter()->redirect('/home');
        }

        public static function setLogout($request){
            SessionWebsiteLogin::logout();
            $request->getRouter()->redirect('/');
        }

    }
?>