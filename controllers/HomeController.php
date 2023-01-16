<?php

require_once("models/HomeManager.php");

class HomeController
{
    private HomeManager $homeManager;

    public function __construct() {
        $this->homeManager = new HomeManager();
        $this->homeManager->getAllAdminsDb();
    }

    private function generatePage(array $data): void {
        extract($data); // create variables from an array
        ob_start();
        require_once("views/homeView.php");
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    public function home(): void {
        $dataAdmins = $this->homeManager->getAdmins();
        //var_dump($dataAdmins);
        foreach($dataAdmins as $oneAdmin) {
            $admin = $oneAdmin;
            //var_dump($admin);
        }

        $data_page = [
            "page_description" => "Portfolio de Charles Cantin photographe",
            "page_title" => "Accueil",
            "admin" => $admin,
        ];
        $this->generatePage($data_page);
    }




}