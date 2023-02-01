<?php

require_once ("models/class/ModelClass.php");
require_once ("models/class/ServiceClass.php");


class ServiceManager extends ModelClass
{
    private array $services;

    public function addService(ServiceClass $service) {
        $this->services[] = $service;
    }

    public function getServices(): ?array {
        return $this->services;
    }

    /**
     *
     */
    public function getAllServicesDb() {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM services");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($data as $service) {
            $s = new ServiceClass($service['id_service'], $service['title_service'], $service['price_service'], $service['content_service'], $service['id_admin']);
            $this->addService($s);
        }
    }

    /**
     * Get a service by id
     *
     * @param string $id
     * @return ServiceClass|null
     */
    public function getServiceById(string $id): ?ServiceClass
    {
        foreach ($this->services as $service) {
            if ($service->getIdService() === (int)$id) {
                //var_dump($service);
                return $service;
            }
        }
    }

    /**
     * Add a new service in the DB
     *
     * @param $title
     * @param $price
     * @param $content
     * @param $idAdmin
     */
    public function addServiceDb($title, $price, $content, $idAdmin): void {

        $pdo = $this->getDb();
        // Count the duplicate photos in the database
        $req = $pdo->prepare("SELECT count(*) as numberTitle FROM services WHERE title_service = :title");
        $req->bindValue(":title", $title, PDO::PARAM_STR);
        $req->execute();

        // Reading the rows in the table services
        while($titleVerification = $req->fetch()) {
            // If the service already exists, print an error message
            if($titleVerification['numberTitle'] >= 1) {
                echo("Le titre de la prestation existe déjà");
                header('location:'.URL."tarifs/ajouterTarif");
                exit();
            }
            // Create the new service in the database
            else {
                $req = $pdo->prepare("INSERT INTO services (title_service, price_service, content_service, id_admin) VALUES (:title, :price, :content, :id_admin)");
                $req->bindValue(":title", $title, PDO::PARAM_STR);
                $req->bindValue(":price", $price, PDO::PARAM_STR); // for a float ok
                $req->bindValue(":content", $content, PDO::PARAM_STR);
                $req->bindValue(":id_admin", $idAdmin, PDO::PARAM_INT);

                $data = $req->execute();
                $req->closeCursor();

                if($data > 0) {
                    $service = new ServiceClass($this->getDb()->lastInsertId(), $title, $price, $content, $idAdmin);
                    $this->addService($service);
                    echo ("Le tarif a bien été créé");
                }
            }
        }
    }

    public function deleteDb(string $id): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("DELETE FROM services WHERE id_service = :id");
        $req->bindValue(":id", (int)$id, PDO::PARAM_INT);
        $data = $req->execute();
        $req->closeCursor();

        if($data > 0) {
            $service = $this->getServiceById($id);
            unset($service); // Delete $service in the array $services
        }
    }

}