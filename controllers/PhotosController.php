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

    /**
     * Generate a page
     *
     * @param array $data
     */
    private function generatePage(array $data): void {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    /**
     * Diplay all the photos in a gallery
     */
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

    /**
     * Display a Create form to add a photo
     */
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

    /**
     * Add a new photo
     *
     */
    public function createValidation() {
        // Secure the user input
        $legend_photo = SecurityClass::secureHtml($_POST['legend_photo']);
        $id_admin = 1;

        if(strlen($legend_photo) < 50) {
            //echo "Légende de photo mal renseignée. Réessayer";
            header("location: ".URL."galerie");
            exit();
        } else {
            $file = $_FILES['image_photo'];
            $directory = "public/assets/images/";
            $image_photo = $this->addImage($file, $directory);
            $this->photoManager->addPhotoDb($legend_photo, $image_photo, $id_admin, $_POST['id_category']);
            header("location: ".URL."galerie");
            exit();
        }
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

        // If the directory public/assets/images doesn't exist it creates it 0777 : rights for everybody
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

    /**
     * Delete a photo
     *
     * @param string $id
     */
    public function delete(string $id): void {
        $imageName = $this->photoManager->getPhotoById($id)->getImagePhoto();
        unlink("public/assets/images/".$imageName); // Delete the image file
        $this->photoManager->deleteDb($id);
        header("location: ".URL."galerie");
        exit();
    }

    /**
     * Display a photo updating form
     *
     * @param string $id
     */
    public function update(string $id): void {
        $photo = $this->photoManager->getPhotoById($id);
        $categories = $this->categoryManager->getCategories();

        $data_page = [
            "page_description" => "Modfification d'une photo",
            "page_title" => "Modfification une photo",
            "photo" => $photo,
            "categories" => $categories,
            "view" => "views/updatePhotoView.php",
            //"view" => "views/admin/updatePhoto.php",
        ];
        $this->generatePage($data_page);
    }

    /**
     * Update a photo
     */
    public function updateValidation(): void {
        // Secure the user input
        $legend_photo = SecurityClass::secureHtml($_POST['legend_photo']);
        $id_admin = 1;

        if(strlen($legend_photo) < 50) {
            //echo "Légende de photo trop longue. Réessayer";
            header("location: ".URL."galerie");
            exit();
        }
        else {
            $oldImage = $this->photoManager->getPhotoById($_POST['oldId_photo'])->getImagePhoto();
            $file = $_FILES['image_photo'];

            // if the admin is changing the image file
            if($file['size'] > 0) {
                // remove the old image
                unlink("public/assets/images/".$oldImage);
                // add a new image file
                $directory = "public/assets/images/";
                $image_photo = $this->addImage($file, $directory);
            } else {
                $image_photo = $oldImage;
            }

            $this->photoManager->updatePhotoDb($_POST['oldId_photo'], $legend_photo, $image_photo, $_POST['id_category'], $id_admin);
            header("location: ".URL."galerie");
            exit();
        }
    }

}