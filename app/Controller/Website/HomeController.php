<?php
    namespace App\Controller\Website;
    use App\Utils\ViewManager;

    class HomeController extends HomePageController{
        public static function getHomePage(){
            $content = ViewManager::render('website/home', [
                
            ]);
            return parent::getPage('Home | Nhongify', $content);
        }
    }
?>