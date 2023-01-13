<?php


class ErrorController
{
    private function generatePage(array $data): void {
        extract($data);
        ob_start();
        require_once("views/errorView.php");
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    public function error(string $msg): void {
        $data_page = [
            "page_description" => "Page d'erreur permettant de gérer les erreurs.",
            "page_title" => "Erreur",
            "msg" => $msg,
        ];
        $this->generatePage($data_page);
    }



}