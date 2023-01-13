<?php


class ContactController
{
    private function generatePage(array $data): void {
        extract($data);
        ob_start();
        require_once("views/contactView.php");
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    public function contact(): void {
        $data_page = [
            "page_description" => "Formulaire de contact pour joindre Charles Cantin photographe",
            "page_title" => "Contact",
        ];
        $this->generatePage($data_page);
    }
}