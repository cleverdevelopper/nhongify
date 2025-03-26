<?php
    namespace App\Controller\Website;
    use App\Utils\ViewManager;

    class HomePageController{
        public static function getPage($title, $content){
            return ViewManager::render('website/homepage', [
                'title'          => $title,
                'content'        => $content
            ]);
        }
    }
?>