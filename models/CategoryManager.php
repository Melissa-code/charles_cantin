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

    /**
     * Create a new category in the database
     * @param $title
     * @param $idAdmin
     */
    public function addCategoryDb($title, $idAdmin): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("INSERT INTO categories (title_category, id_admin) VALUES (:title, :id_admin)");
        $req->bindValue(":title", $title, PDO::PARAM_STR);
        $req->bindValue(":id_admin", $idAdmin, PDO::PARAM_INT);
        $data = $req->execute();
        $req->closeCursor();

        // If the category has been created, add it in the categories array
        if($data > 0) {
            $category = new CategoryClass($this->getDb()->lastInsertId(), $title, $idAdmin);
            $this->addCategory($category);
            echo ("La catégorie a bien été créée");
        }
    }

}