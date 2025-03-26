<?php
    namespace App\Http\Middleware;
    use \App\Session\Website\LoginSession as  SessionAdminLogin;

    class RequereUserLogin{
         public function handle($request, $next){
            if(!SessionAdminLogin::isLoged()){
                $request->getRouter()->redirect('/login');
            }
             return $next($request);
         }
    }
?>