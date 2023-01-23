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
        require_once($view);
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    public function gallery(): void {
        $photos = $this->photoManager->getPhotos();
        $admins = $this->homeManager->getAdmins();
        $categories = $this->categoryManager->getCategories();

        $data_page = [
            "page_description" => "Galerie des photos prises de Charles Cantin",
            "page_title" => "Galerie",
            "photos" => $photos,
            "admins" => $admins,
            "categories" => $categories,
            "view" => "views/photosView.php",
        ];
        $this->generatePage($data_page);
    }

    public function create(): void {
        $categories = $this->categoryManager->getCategories();

        $data_page = [
            "page_description" => "Ajout d'une photo",
            "page_title" => "Ajouter une photo",
            "categories" => $categories,
            "view" => "views/createPhotoView.php",
        ];
        $this->generatePage($data_page);
    }

    public function createValidation() {
        $file = $_FILES['image_photo'];
        //print_r($file);
        $directory = "public/assets/images/";
        $image_photo = $this->addImage($file, $directory);
        $id_admin = 1;
        //echo $_POST['id_category'];
        $this->photoManager->addPhotoDb($_POST['legend_photo'], $image_photo, $id_admin, $_POST['id_category']);
        //header("location: ".URL."galerie");
        //exit();
    }


    /**
     * Add an image file
     *
     * @param $file
     * @param $dir
     * @return string
     * @throws Exception
     */
    private function addImage($file, $dir): string {
        // Check if the user has selected an image in the form
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez choisir une image");

        // Check if the directory public/assets/images exists or not
        // If it doesn't exist it creates it 0777 : rights for everybody
        if(!file_exists($dir)) mkdir($dir,0777);

        // Get the file extension
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        // Create a random number to add it to the image
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];

        // Check the different properties file
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        // Add the image in the directory
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
}