<?php


class LoginController
{
    public function generatePage(array $data): void {
        extract($data);
        ob_start();
        require_once("views/loginView.php");
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    public function login(): void {
//        $_SESSION['alert'] = [
//            "message" => "Connexion",
//            "type" => "alert-success"
//        ];

        $data_page = [
            "page_description" => "Formulaire de connexion",
            "page_title" => "Connexion",
        ];
        $this->generatePage($data_page);
    }
}