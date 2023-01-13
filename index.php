<?php
//session_start();

require_once("controllers/ErrorController.php");
require_once ("controllers/HomeController.php");
require_once ("controllers/GalleryController.php");
require_once ("controllers/PricesController.php");
require_once ("controllers/ContactController.php");
require_once ("controllers/LoginController.php");

$errorController = new ErrorController();
$homeController = new HomeController();
$galleryController = new GalleryController();
$pricesController = new PricesController();
$contactController = new ContactController();
$loginController = new LoginController();

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
            $galleryController->gallery();
            break;
        case "tarifs":
            $pricesController->prices();
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

