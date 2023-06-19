<?php
require_once ("MainController.php");


class ErrorController extends MainController
{
    public function error(string $msg): void {
        $data_page = [
            "page_description" => "Page d'erreur permettant de gérer les erreurs.",
            "page_title" => "Erreur",
            "view" => "views/errorView.php",
            "msg" => $msg,
        ];
        $this->generatePage($data_page);
    }

}