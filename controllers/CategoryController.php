<?php

require_once ("models/CategoryManager.php");


class CategoryController {

    private CategoryManager $categoryManager;

    public function __construct() {
        $this->categoryManager = new CategoryManager();
    }

    /**
     * Generate a page
     *
     * @param array $data
     */
    private function generatePage(array $data): void
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    /**
     * Diplay all the categories in an admin page
     */
    public function categories(): void
    {
        $categories = $this->categoryManager->getCategories();
        var_dump($categories);

        $admins = 1;

//        $data_page = [
//            "page_description" => "Liste de toutes les catégories de photos",
//            "page_title" => "Liste des catégories",
//            "categories" => $categories,
//            "admins" => $admins,
//            "view" => "views/admin/categoriesList.php",
//        ];
//        $this->generatePage($data_page);
    }








}

