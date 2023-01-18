<?php

require_once("models/PhotoManager.php");
require_once("models/CategoryManager.php");
require_once("models/HomeManager.php");


class PhotosController
{
    private PhotoManager $photoManager;
    private CategoryManager $categoryManager;
    private HomeManager $homeManager;

    public function __construct() {
        $this->photoManager = new PhotoManager();
        $this->photoManager->getAllPhotosDb();
        $this->categoryManager = new CategoryManager();
        $this->categoryManager->getAllCategoriesDb();
        $this->homeManager = new HomeManager();
        $this->homeManager->getAllAdminsDb();
    }

    private function generatePage(array $data): void {
        extract($data);
        ob_start();
        require_once("views/photosView.php");
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    public function gallery() {
        $dataPhotos = $this->photoManager->getPhotos();
        foreach ($dataPhotos as $photo) {
            //print_r($photo);
        }

        $admins = $this->homeManager->getAdmins();
        //var_dump($admins);
        $categories = $this->categoryManager->getCategories();
        //var_dump($categories);

        $data_page = [
            "page_description" => "Galerie des photos prises de Charles Cantin",
            "page_title" => "Galerie",
            "photos" => $dataPhotos,
            "admins" => $admins,
            "categories" => $categories,

            //"view" => "views/photosView.php",
            //"template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }
}