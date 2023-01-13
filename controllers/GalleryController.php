<?php


class GalleryController
{
    private function generatePage(array $data): void {
        extract($data);
        ob_start();
        require_once("views/galleryView.php");
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    public function gallery(): void {
        $data_page = [
            "page_description" => "Galerie de photos du portfolio de Charles Cantin",
            "page_title" => "Galerie",
        ];
        $this->generatePage($data_page);
    }
}