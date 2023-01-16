<?php

require_once("models/PhotoManager.php");

class PhotosController
{
    private PhotoManager $photoManager;

    public function __construct() {
        $this->photoManager = new PhotoManager();
        $this->photoManager->getAllPhotosDb();
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
        //var_dump($dataPhotos);

        $data_page = [
            "page_description" => "Galerie de photos du portfolio de Charles Cantin",
            "page_title" => "Galerie",

        ];
        $this->generatePage($data_page);
    }
}