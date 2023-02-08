<?php

require_once ("models/class/ModelClass.php");
require_once ("models/class/CategoryClass.php");


class CategoryManager extends ModelClass
{
    private ?array $categories;

    public function addCategory(CategoryClass $category): void {
        $this->categories[] = $category;
    }

    public function getCategories() : ?array {
        return $this->categories;
    }

    /**
     * Get all the categories from the database
     */
    public function getAllCategoriesDb() {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM categories");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($data as $category) {
            $c = new CategoryClass($category['id_category'], $category['title_category'], $category['id_admin']);
            $this->addCategory($c);
            //var_dump($category);
        }
    }

}