<?php

require_once ("models/class/ModelClass.php");
require_once ("models/class/PhotoClass.php");


class PhotoManager extends ModelClass
{
    private array $photos;

    public function addPhoto(PhotoClass $photo) {
        $this->photos[] = $photo;
    }

    public function getPhotos(): ?array {
        return $this->photos;
    }

    public function getAllPhotosDb() {
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

}