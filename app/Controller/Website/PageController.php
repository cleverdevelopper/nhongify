<?php
    namespace App\Controller\Website;
    use App\Utils\ViewManager;

    class PageController{
        public static function getPage($title, $content){
            return ViewManager::render('website/page', [
                'title'          => $title,
                'content'        => $content
            ]);
        }
    }
?>