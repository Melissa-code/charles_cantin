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
    public function getAllCategoriesDb(): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM categories");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($data as $category) {
            $c = new CategoryClass($category['id_category'], $category['title_category'], $category['id_admin']);
            $this->addCategory($c);
        }
    }

    /**
     * Get a category by id
     * @param string $id
     * @return CategoryClass|null
     */
    public function getCategoryById(string $id): ?CategoryClass {
        foreach($this->categories as $category) {
            if($category->getIdCategory() === (int)$id) {
                //var_dump($category);
                return $category;
            }
        }
    }

    /**
     * Create a new category in the database
     * @param $title
     * @param $idAdmin
     */
    public function addCategoryDb($title, $idAdmin): void {

        $pdo = $this->getDb();

        // Count the duplicate categories in the database
        $req = $pdo->prepare("SELECT count(*) as numberTitle FROM categories WHERE title_category = :title");
        $req->bindValue(":title", $title, PDO::PARAM_STR);
        $req->execute();

        // Reading the rows in the table categories
        while($titleVerification = $req->fetch()) {
            // If the service already exists, print an error message
            if ($titleVerification['numberTitle'] >= 1) {
                MessagesClass::alertMsg("Cette catégorie existe déjà.", MessagesClass::RED_COLOR);
                header('location:' . URL . "categories/ajouterCategorie");
                exit();
            }
            // Create the new category in the database
            else {
                $req = $pdo->prepare("INSERT INTO categories (title_category, id_admin) VALUES (:title, :id_admin)");
                $req->bindValue(":title", $title, PDO::PARAM_STR);
                $req->bindValue(":id_admin", $idAdmin, PDO::PARAM_INT);
                $data = $req->execute();
                $req->closeCursor();

                // If the category has been created, add it in the categories array
                if ($data > 0) {
                    $category = new CategoryClass($this->getDb()->lastInsertId(), $title, $idAdmin);
                    $this->addCategory($category);
                }
            }
        }
        $req->closeCursor();
    }

    /**
     * Delete a category in the database
     * @param string $id
     */
    public function deleteDb(string $id): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM categories WHERE id_category = :id');
        $req->bindValue('id', (int)$id, PDO::PARAM_INT);
        $data = $req->execute();
        $req->closeCursor();

        if($data > 0) {
            $category = $this->getCategoryById($id);
            unset($category);
        }
    }

    /**
     * Update a category in the database
     * @param string $oldId_category
     * @param string $title_category
     * @param int $id_admin
     */
    public function updateCategoryDb(string $oldId_category, string $title_category, int $id_admin): void {
        $pdo = $this->getDb();

        // Count the duplicate titles of a category
        $req = $pdo->prepare("SELECT count(*) AS numberTitle FROM categories WHERE title_category = :title");
        $req->bindValue("title", $title_category, PDO::PARAM_STR);
        $req->execute();

        // Read the rows in the categories table
        while($titleVerification = $req->fetch()) {
            if($titleVerification['numberTitle'] >= 1) {
                MessagesClass::alertMsg("Cette catégorie existe déjà.", MessagesClass::RED_COLOR);
                header('location:' . URL . "categories/modifier/".$oldId_category);
                exit();
            }
            else {
                // Update the category in the database
                $req = $pdo->prepare("UPDATE categories SET title_category = :title, id_admin = :idAdmin WHERE id_category = :oldId");
                $req->bindValue('oldId', (int)$oldId_category, PDO::PARAM_INT);
                $req->bindValue('title', $title_category, PDO::PARAM_STR);
                $req->bindValue('idAdmin', $id_admin, PDO::PARAM_INT);
                $data = $req->execute();
                $req->closeCursor();
            }

            // Update the category object
            if($data > 0) {
                $this->getCategoryById($oldId_category)
                    ->setTitleCategory($title_category)
                    ->setIdAdmin($id_admin);
            }
        }
    }

}