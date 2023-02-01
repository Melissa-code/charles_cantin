<?php
//session_start();

require_once("controllers/SecurityClass.php");
require_once("controllers/ErrorController.php");
require_once ("controllers/HomeController.php");
require_once("controllers/PhotosController.php");
require_once("controllers/ServicesController.php");
require_once ("controllers/ContactController.php");
require_once ("controllers/LoginController.php");
require_once ("controllers/CategoryController.php");

$errorController = new ErrorController();
$homeController = new HomeController();
$photosController = new PhotosController();
$servicesController = new ServicesController();
$contactController = new ContactController();
$loginController = new LoginController();
$categoryController = new CategoryController();

if($_SERVER['SERVER_NAME'] === 'localhost'){
    define("URL", str_replace("index.php", "", "http". "://". $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF']));
} else {
    define("URL", str_replace("index.php", "", "https". "://". $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF']));
}

try {
    if(empty($_GET['page'])) {
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL); //to secure the url
        $page = $url[0];
    }

    switch ($page) {
        case "accueil":
            $homeController->home();
        break;
        case "galerie":
            if(empty($url[1])) {
                $photosController->gallery();
            } else if($url[1] === "ajouterPhoto") {
                $photosController->create();
            } else if($url[1] === "ajouterPhotoValidation") {
                $photosController->createValidation();
            } else if($url[1] === "supprimer") {
                $photosController->delete($url[2]);
            } else if($url[1] === "modifierPhoto") {
                $photosController->update($url[2]);
            } else if($url[1] === "modifierPhotoValidation") {
                $photosController->updateValidation();
            }
            else if($url[1] === "categories") {
                $categoryController->categories();
            } else if($url[1] === "ajouterCategorie") {
                $photosController->create();
            }
        break;
        case "tarifs":
            if(empty($url[1])) {
                $servicesController->services();
            } else if($url[1] === "ajouterTarif") {
                $servicesController->create();
            } else if($url[1] === "ajouterTarifValidation") {
                $servicesController->createValidation();
            }
        break;
        case "contact":
            $contactController->contact();
        break;
        case "connexion":
            $loginController->login();
        break;
        default:
            throw new Exception("La page n'existe pas.");
    }
} catch(Exception $e) {
    $errorController->error($e->getMessage());
}

