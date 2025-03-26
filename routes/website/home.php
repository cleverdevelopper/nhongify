<?php
    use App\Controller\Website;
    use App\Http\Response;

   
    $objRouter->get('/home', [
        'middlewares'   => [
            'requere-admin-login'
        ],
        function ($request){
            return new Response(200, Website\HomeController::getHomePage($request));
        }
    ]);


?>