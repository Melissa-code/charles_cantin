<?php


class LoginController extends MainController
{

    public function login(): void {
//        $_SESSION['alert'] = [
//            "message" => "Connexion",
//            "type" => "alert-success"
//        ];

        $data_page = [
            "page_description" => "Formulaire de connexion",
            "page_title" => "Connexion",
            "view" => "views/loginView.php",
            "page_css" => "login.css",
        ];
        $this->generatePage($data_page);
    }
}