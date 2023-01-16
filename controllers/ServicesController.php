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
        require_once("views/servicesView.php");
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
            "page_title" => "Tarifs et prestation",
            "services" => $dataServices,
            "service" => $service
        );
        $this->generatePage($data_page);
    }

}