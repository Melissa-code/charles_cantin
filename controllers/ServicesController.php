<?php

require_once ("models/ServiceManager.php");

class ServicesController
{
    private ServiceManager $serviceManager;

    public function __construct() {
        $this->serviceManager = new ServiceManager();
        $this->serviceManager->getAllServicesDb();
    }

    private function generatePage(array $data): void {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once("views/common/template.php");
    }

    /**
     * Display all the services & tarifs
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
            "service" => $service
        );
        $this->generatePage($data_page);
    }

    /**
     * Display a Create form to add a service
     */
    public function create() : void {
        $data_page = array(
            "page_description" => "Formulaire de création d'un tarif et d'une prestation",
            "page_title" => "Création d'un tarif et prestation",
            "view" => "views/admin/createServiceView.php"
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

        if(strlen($title_service) > 50) {
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

}