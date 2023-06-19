<?php

class MainController
{
    /**
     * Generate a page
     * @param array $data
     */
    protected function generatePage(array $data): void {
        extract($data); // create variables from an array
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }
}