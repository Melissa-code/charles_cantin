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

    public function getAllPhotosDb(): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM photos");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($data as $photo) {
            $ph = new PhotoClass($photo['id_photo'], $photo['legend_photo'], $photo['image_photo'], $photo['id_admin'], $photo['id_category']);
            $this->addPhoto($ph);
            //var_dump($photo);
        }
    }

    /**
     * Add a photo in the DB
     *
     * @param $legend
     * @param $image
     * @param $idAdmin
     * @param $idCategory
     */
    public function addPhotoDb($legend, $image, $idAdmin, $idCategory) {
        $pdo = $this->getDb();
        $req = $pdo->prepare("INSERT INTO photos (legend_photo, image_photo, id_admin, id_category) VALUES (:legend, :image, :id_admin, :id_category)");
        $req->bindValue(":legend", $legend, PDO::PARAM_STR);
        $req->bindValue(":image", $image, PDO::PARAM_STR);
        $req->bindValue(":id_admin", $idAdmin, PDO::PARAM_INT);
        $req->bindValue(":id_category", $idCategory, PDO::PARAM_INT);
        $data = $req->execute();
        $req->closeCursor();

        // Check if the photo has been created
        if($data > 0) {
            $photo = new PhotoClass($this->getDb()->lastInsertId(), $legend, $image, $idAdmin, $idCategory);
            $this->addPhoto($photo);
        }
    }


}