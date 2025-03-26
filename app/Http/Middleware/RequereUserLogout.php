<?php
    namespace App\Http\Middleware;
    use \App\Session\Website\LoginSession as  SessionAdminLogin;

    class RequereUserLogout{
        public function handle($request, $next){
            if(SessionAdminLogin::isLoged()){
                $request->getRouter()->redirect('/home');
            }
            return $next($request);
         }
    }
?>