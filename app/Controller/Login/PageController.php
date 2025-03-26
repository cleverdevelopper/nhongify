<?php
    namespace App\Controller\Login;
    use App\Utils\ViewManager;

    class PageController{
        public static function getPage($title, $content){
            return ViewManager::render('website/login/page', [
                'title'          => $title,
                'content'        => $content
            ]);
        }
    }
?>