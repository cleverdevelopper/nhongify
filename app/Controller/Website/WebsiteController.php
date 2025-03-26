<?php
    namespace App\Controller\Website;
    use App\Utils\ViewManager;

    class WebsiteController extends PageController{
        public static function getHomePage(){
            $content = ViewManager::render('website/webpage', [
                
            ]);
            return parent::getPage('Nhongify - Home Page', $content);
        }
    }
?>