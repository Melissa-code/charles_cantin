<?php

require_once ("models/CategoryManager.php");
require_once("MainController.php");


class CategoryController extends MainController {

    private CategoryManager $categoryManager;

    public function __construct() {
        $this->categoryManager = new CategoryManager();
        $this->categoryManager->getAllCategoriesDb();
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
            "view" => "views/admin/categories/categoriesView.php",
            "page_css" => "categories.css",
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
            "page_css" => "form.css",
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
            MessagesClass::alertMsg("Titre de la catégorie mal renseigné.", MessagesClass::RED_COLOR);
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

    /**
     * Display a category updating form
     * @param string $id
     */
    public function update(string $id) : void {
        $category = $this->categoryManager->getCategoryById($id);

        $data_page = [
            "page_description" => "Modification d'une catégorie",
            "page_title" => "Modifier une catégorie",
            "category" => $category,
            "view" => "views/admin/categories/updateCategoryView.php",
            "page_css" => "form.css"
        ];
        $this->generatePage($data_page);
    }

    /**
     * Update a category
     */
    public function updateValidation(): void {
        $title_category = SecurityClass::secureHtml($_POST['title_category']);
        $oldId_category = SecurityClass::secureHtml($_POST['oldId_category']);
        $id_admin = 1;

        // Add constraints to validate the user data
        if($title_category === "" || strlen($title_category) >= 30) {
            MessagesClass::alertMsg("Titre de la catégorie mal renseigné. Réessayer.", MessagesClass::RED_COLOR);
            header("location: ".URL."categories/modifier/".$oldId_category);
            exit();
        } else {
            $this->categoryManager->updateCategoryDb($oldId_category, $title_category, $id_admin);
            MessagesClass::alertMsg("La catégorie a bien été modifiée.", MessagesClass::GREEN_COLOR);
            header("location: ".URL."categories");
            exit();
        }
    }

}


