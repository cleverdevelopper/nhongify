<?php
    namespace App\Controller\Login;
    use App\Model\WebsiteEntity\Login\Utilizador;
    use App\Utils\ViewManager;
    //use \App\Session\Login\LoginSession as  SessionAdminLogin;
    use App\Controller\Alert;

    class LoginController extends PageController{
        public static function getLoginPage($request, $errorMessage = null){
            $status = !is_null($errorMessage) ? Alert::getError($errorMessage) : '';

            $content = ViewManager::render('login/login', [
                'status'  => $status
            ]);

            return parent::getPage('Centro medico - Login', $content);
        }
        
        public static function setLoginPage($request){
            $postVars   = $request->getPostVars();
            $utilizador = $postVars['text_utilizador'] ?? '';
            $password   = $postVars['text_password'] ?? '';

            $objUtilizador = Utilizador::getUserByUsername($utilizador);

            if(empty($objUtilizador)){
                return self::getLoginPage($request, 'Dados de login invalidos.' );
            }

            if(md5($password) != $objUtilizador->palavra_passe){
                return self::getLoginPage($request, 'Dados de login invalidos.' );
            }

            //SessionAdminLogin::login($objUtilizador);

            $request->getRouter()->redirect('/dashboard');
        }

        public static function setLogout($request){
            //SessionAdminLogin::logout();
            $request->getRouter()->redirect('/');
        }

    }
?>