<?php

if(empty($_GET['page'])) {
    $page = "accueil";
} else {
    $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL); //to secure the url
    $page = $url[0];
}

switch ($page) {
    case "accueil":
        $page_description = "Site vitrine de Charles Cantin photographe";
        $page_title = "Accueil";
        $page_content = "<h1>Charles Cantin - Photographe</h1>";
    break;
    case "galerie":
        $page_description = "Site vitrine de Charles Cantin photographe";
        $page_title = "Galerie";
        $page_content = "<h1>Galerie photos</h1>";
        break;
    case "tarifs":
        $page_description = "Site vitrine de Charles Cantin photographe";
        $page_title = "Tarifs et prestations";
        $page_content = "<h1>Tarifs et prestations</h1>";
        break;
    case "contact":
        $page_description = "Site vitrine de Charles Cantin photographe";
        $page_title = "Contact";
        $page_content = "<h1>Contact</h1>";
        break;
    case "connexion":
        $page_description = "Site vitrine de Charles Cantin photographe";
        $page_title = "Connexion";
        $page_content = "<h1>Connexion</h1>";
        break;
}


require_once("views/common/template.php");
?>

<img src="public/assets/images/bg-home.png" alt="">