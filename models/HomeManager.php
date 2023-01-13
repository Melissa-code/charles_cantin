<?php

require_once ("models/class/ModelClass.php");

class HomeManager extends ModelClass
{
    public function getAll() {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM admins");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $data;
    }
}