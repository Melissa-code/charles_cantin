<?php
require_once ("models/ServiceManager.php");
require_once ("MainController.php");


class ServicesController extends MainController
{
    private ServiceManager $serviceManager;

    public function __construct() {
        $this->serviceManager = new ServiceManager();
        $this->serviceManager->getAllServicesDb();
    }


    /**
     * Display all the services & prices
     */
    public function services(): void {
        $dataServices = $this->serviceManager->getServices();
        foreach ($dataServices as $oneService) {
            $service = $oneService;
        }

        $data_page = array(
            "page_description" => "Tarifs et prestations de Charles Cantin photographe",
            "page_title" => "Tarifs et prestations",
            "view" => "views/servicesView.php",
            "services" => $dataServices,
            "service" => $service,
            "page_css" => "services.css",
        );
        $this->generatePage($data_page);
    }

    /**
     * Display a create form to add a new service
     */
    public function create() : void {
        $data_page = array(
            "page_description" => "Formulaire de création d'un tarif et d'une prestation",
            "page_title" => "Création d'un tarif et prestation",
            "view" => "views/admin/services/createServiceView.php"
             );
        $this->generatePage($data_page);
    }

    /**
     * Add a new service
     */
    public function createValidation(): void {
        // Secure the user inputs
        $title_service = SecurityClass::secureHtml($_POST['title_service']);
        $price_service = SecurityClass::secureHtml($_POST['price_service']);
        $content_service = SecurityClass::secureHtml($_POST['content_service']);
        $id_admin = 1;

        if($price_service === "") {
            $price_service = "0";
        }

        if(strlen($title_service) > 100) {
            //echo "Titre de la prestation mal renseigné. Réessayer";
            header("location: ".URL."tarifs");
            exit();
        }
        else {
            $this->serviceManager->addServiceDb($title_service, $price_service, $content_service, $id_admin);
            header("location: ".URL."tarifs");
            exit();
        }
    }

    /**
     * Delete a service
     *
     * @param string $id
     */
    public function delete(string $id): void {
        $this->serviceManager->deleteDb($id);
        header("location: ".URL."tarifs");
        exit();
    }

    /**
     * Display a service updating form
     *
     * @param string $id
     */
    public function update(string $id) : void {
        $service = $this->serviceManager->getServiceById($id);

        $data_page = [
            "page_description" => "Modification d'un tarif et prestation",
            "page_title" => "Modification d'un tarif et prestation",
            "service" => $service,
            "view" => "views/admin/services/updateServiceView.php",
        ];
        $this->generatePage($data_page);
    }

    /**
     * Update a service
     */
    public function updateValidation(): void {
        // Secure the user inputs
        $title_service = SecurityClass::secureHtml($_POST['title_service']);
        $price_service = SecurityClass::secureHtml($_POST['price_service']);
        $content_service = SecurityClass::secureHtml($_POST['content_service']);
        $id_admin = 1;

        if($price_service === "") {
            $price_service = "0";
        }

        // Check the service title length
        if(strlen($title_service) > 100) {
            //echo "Titre du tarif trop long. Resaisir un titre plus cours";
            header("location: ".URL."tarifs");
            exit();
        }
        else {
            $this->serviceManager->updateServiceDb($_POST['oldId_service'], $title_service, $price_service, $content_service, $id_admin);
            header("location: ".URL."tarifs");
            exit();
        }
    }

}