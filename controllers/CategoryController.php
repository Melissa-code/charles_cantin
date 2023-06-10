<?php

require_once ("models/CategoryManager.php");


class CategoryController {

    private CategoryManager $categoryManager;

    public function __construct() {
        $this->categoryManager = new CategoryManager();
        $this->categoryManager->getAllCategoriesDb();
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
        //var_dump($categories);

        $admins = 1;

        $data_page = [
            "page_description" => "Liste de toutes les catégories de photos",
            "page_title" => "Liste des catégories",
            "categories" => $categories,
            "admins" => $admins,
            "view" => "views/categoriesView.php",

        ];
        $this->generatePage($data_page);
    }

    /**
     * Display a Create form to add a new category
     */
    public function create(): void {
        $categories = $this->categoryManager->getCategories();

        $data_page = [
            "page_description" => "Ajout d'une nouvelle catégorie",
            "page_title" => "Ajouter une catégorie",
            "categories" => $categories,
            "view" => "views/createCategoryView.php",
        ];
        $this->generatePage($data_page);
    }





}


