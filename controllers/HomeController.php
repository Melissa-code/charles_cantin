<?php

require_once("models/HomeManager.php");
require_once("MainController.php");


class HomeController extends MainController
{
    private HomeManager $homeManager;

    public function __construct() {
        $this->homeManager = new HomeManager();
        $this->homeManager->getAllAdminsDb();
    }


    /**
     * Home
     */
    public function home(): void {
        $dataAdmins = $this->homeManager->getAdmins();
        foreach($dataAdmins as $oneAdmin) {
            $admin = $oneAdmin;
        }

        $data_page = [
            "page_description" => "Portfolio de Charles Cantin photographe",
            "page_title" => "Accueil",
            "admin" => $admin,
            "view" => "views/homeView.php",
            "page_css" => "home.css"
        ];
        $this->generatePage($data_page);
    }

}