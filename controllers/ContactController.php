<?php

require_once ("MainController.php");


class ContactController extends MainController
{
    /**
     * contact page
     */
    public function contact(): void {
        $data_page = [
            "page_description" => "Formulaire de contact pour joindre Charles Cantin photographe",
            "page_title" => "Contact",
            "view" => "views/contactView.php",
            "page_css" => "contact.css",
        ];
        $this->generatePage($data_page);
    }
}