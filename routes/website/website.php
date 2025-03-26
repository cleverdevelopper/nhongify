<?php
    use App\Controller\Website;
    use App\Http\Response;

   
    $objRouter->get('/', [
        'middlewares'   => [
            'maintenance'
        ],
        function ($request){
            return new Response(200, Website\WebsiteController::getHomePage($request));
        }
    ]);

    $objRouter->get('/signup', [
        'middlewares'   => [
            'requere-admin-logout'
        ],
        function ($request){
            return new Response(200, Website\ClienteController::getNewCliente($request));
        }
    ]);

    $objRouter->post('/signup', [
        'middlewares'   => [
            'requere-admin-logout'
        ],
        function ($request){
            return new Response(200, Website\ClienteController::setNewCliente($request));
        }
    ]);

    $objRouter->get('/login', [
        'middlewares'   => [
            'requere-admin-logout'
        ],
        function ($request){
            return new Response(200, Website\LoginController::getLoginPage($request));
        }
    ]);

    $objRouter->post('/login', [
        'middlewares'   => [
            'requere-admin-logout'
        ],
        function ($request){
            return new Response(200, Website\LoginController::setLoginPage($request));
        }
    ]);

    $objRouter->get('/logout', [
        'middlewares'   => [
            'requere-admin-login'
        ],
        function ($request){
            return new Response(200, Website\LoginController::setLogout($request));
        }
    ]);


?>