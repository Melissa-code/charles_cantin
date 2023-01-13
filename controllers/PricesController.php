<?php


class PricesController
{
    private function generatePage(array $data): void {
        extract($data);
        ob_start();
        require_once("views/pricesView.php");
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    public function prices(): void {
        $data_page = [
            "page_description" => "Tarifs et prestations de Charles Cantin photographe",
            "page_title" => "Tarifs et prestation",
        ];
        $this->generatePage($data_page);
    }

}