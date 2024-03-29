<?php

require_once ("models/class/ModelClass.php");
require_once ("models/class/PhotoClass.php");


class PhotoManager extends ModelClass
{
    private array $photos;

    public function addPhoto(PhotoClass $photo): void {
        $this->photos[] = $photo;
    }

    public function getPhotos(): ?array {
        return $this->photos;
    }

    /**
     * Get all the photos from the database
     */
    public function getAllPhotosDb(): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM photos");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($data as $photo) {
            $ph = new PhotoClass($photo['id_photo'], $photo['legend_photo'], $photo['image_photo'], $photo['id_admin'], $photo['id_category']);
            $this->addPhoto($ph);
        }
    }

    /**
     * Get a photo by id
     *
     * @param string $id
     * @return PhotoClass|null
     */
    public function getPhotoById(string $id): ?PhotoClass
    {
        foreach ($this->photos as $photo) {
            if ($photo->getIdPhoto() === (int)$id) {
                return $photo;
            }
        }
    }

    /**
     * Add a new photo in the DB
     *
     * @param $legend
     * @param $image
     * @param $idAdmin
     * @param $idCategory
     */
    public function addPhotoDb($legend, $image, $idAdmin, $idCategory) {
        $pdo = $this->getDb();
        // Count the duplicate photos in the database
        $req = $pdo->prepare("SELECT count(*) as numberLegend FROM photos WHERE legend_photo = :legend");
        $req->bindValue(":legend", $legend, PDO::PARAM_STR);
        $req->execute();

        // Reading the rows of the table
        while($legendVerification = $req->fetch()) {
            // If the photos already exists, print an error message
            if($legendVerification['numberLegend'] >= 1) {
                MessagesClass::alertMsg("Cette photo existe déjà.", MessagesClass::RED_COLOR);
                header('location:'.URL."galerie/ajouterPhoto");
                exit();
            }
            // Create the new photo in the database
            else {
                $req = $pdo->prepare("INSERT INTO photos (legend_photo, image_photo, id_admin, id_category) VALUES (:legend, :image, :id_admin, :id_category)");
                $req->bindValue(":legend", $legend, PDO::PARAM_STR);
                $req->bindValue(":image", $image, PDO::PARAM_STR);
                $req->bindValue(":id_admin", $idAdmin, PDO::PARAM_INT);
                $req->bindValue(":id_category", $idCategory, PDO::PARAM_INT);
                $data = $req->execute();
                $req->closeCursor();

                // If the photo has been created, add it in the photos array
                if($data > 0) {
                    $photo = new PhotoClass($this->getDb()->lastInsertId(), $legend, $image, $idAdmin, $idCategory);
                    $this->addPhoto($photo);
                }
            }
        }
    }

    /**
     * Delete a photo in the database
     *
     * @param ?string $id
     */
    public function deleteDb(?string $id) : void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("DELETE FROM photos WHERE id_photo = :id");
        $req->bindValue(":id", (int)$id, PDO::PARAM_INT);
        $data = $req->execute();
        $req->closeCursor();

        if($data > 0) {
            $photo = $this->getPhotoById($id);
            unset($photo); // Delete $photo in the array $photos
        }
    }

    /**
     * Update a photo in the database
     *
     * @param string|null $oldId
     * @param string|null $legend
     * @param string|null $image
     * @param string|null $id_category
     * @param int|null $id_admin
     */
    public function updatePhotoDb(?string $oldId, ?string $legend, ?string $image, ?string $id_category, ?int $id_admin) {
        $pdo = $this->getDb();

        // Count the duplicate photos in the database
        $req = $pdo->prepare("SELECT count(*) as numberLegend FROM photos WHERE legend_photo = :legend");
        $req->bindValue(":legend", $legend, PDO::PARAM_STR);
        $req->execute();

        // Reading the rows of the table
        while($legendVerification = $req->fetch()) {
            // If the photos already exists, print an error message
            if($legendVerification['numberLegend'] >= 1) {
                MessagesClass::alertMsg("Cette photo existe déjà.", MessagesClass::RED_COLOR);
                header('location:'.URL."galerie/modifierPhoto/".$oldId);
                exit();
            }
            // Create the new photo in the database
            else {
                $req = $pdo->prepare("UPDATE photos SET legend_photo = :legend, image_photo = :image, id_category = :id_category, id_admin = :id_admin WHERE id_photo = :oldId");
                $req->bindValue(":oldId", (int)$oldId, PDO::PARAM_INT);
                $req->bindValue(":legend", $legend, PDO::PARAM_STR);
                $req->bindValue(":image", $image, PDO::PARAM_STR);
                $req->bindValue(":id_category", (int)$id_category, PDO::PARAM_INT);
                $req->bindValue(":id_admin", $id_admin, PDO::PARAM_INT);
                $data = $req->execute();
                $req->closeCursor();

                // Update the photo object
                if ($data > 0) {
                    $this->getPhotoById($oldId)
                        ->setLegendPhoto($legend)
                        ->setImagePhoto($image)
                        ->setIdCategory($id_category)
                        ->setIdAdmin($id_admin);
                }
            }
        }
    }

}