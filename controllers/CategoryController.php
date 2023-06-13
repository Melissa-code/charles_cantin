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
        $admins = 1;

        $data_page = [
            "page_description" => "Liste de toutes les catégories de photos",
            "page_title" => "Liste des catégories",
            "categories" => $categories,
            "admins" => $admins,
            "view" => "views/categoriesView.php",
            "page_css" => "list.css",
        ];
        $this->generatePage($data_page);
    }

    /**
     * Display a Create form to add a new category
     */
    public function create(): void {
        $categories= $this->categoryManager->getCategories();

        $data_page = [
            "page_description" => "Ajout d'une nouvelle catégorie",
            "page_title" => "Ajouter une catégorie",
            "categories" => $categories,
            "view" => "views/admin/categories/createCategoryView.php",
            "page_css" => "createForm.css",
        ];
        $this->generatePage($data_page);
    }

    /**
     * Create a new category
     */
    public function createValidation() {
        $title_category = $_POST['title_category'];
        $id_admin = 1;

        if($title_category === "" || strlen($title_category) >= 30) {
            MessagesClass::alertMsg("Titre de la catégorie mal renseigné. Réessayer.", MessagesClass::RED_COLOR);
            header("location: ".URL."categories/ajouterCategorie");
            exit();
        } else {
            $title_category = SecurityClass::secureHtml($title_category);
            $this->categoryManager->addCategoryDb($title_category, $id_admin);
            MessagesClass::alertMsg("La catégorie a bien été créée.", MessagesClass::GREEN_COLOR);
            header("location: ".URL."categories");
            exit();
        }
    }

    /**
     * Delete a category
     * @param string $id
     */
    public function delete(string $id): void {
        $this->categoryManager->deleteDb($id);
        header("location: ".URL."categories");
        exit();
    }


}


