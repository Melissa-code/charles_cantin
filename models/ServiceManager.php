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


}