<?php


class ServiceClass
{
    private int $id_service;
    private string $title_service;
    private ?float $price_service;
    private string $content_service;
    private int $id_admin;

    public function __construct(int $id_service, string $title_service, ?float $price_service, string $content_service, int $id_admin) {
        $this->id_service = $id_service;
        $this->title_service = $title_service;
        $this->price_service = $price_service;
        $this->content_service = $content_service;
        $this->id_admin =  $id_admin;
    }

    public function getIdService(): ?int {
        return $this->id_service;
    }


    public function getTitleService(): ?string {
        return $this->title_service;
    }

    public function setTitleService(string $title_service): ?self {
        $this->title_service = $title_service;
        return $this;
    }

    public function getPriceService(): ?float {
        return $this->price_service;
    }

    public function setPriceService(float $price_service): ?self {
        $this->price_service = $price_service;
        return $this;
    }

    public function getContentService(): ?string {
        return $this->content_service;
    }

    public function setContentService(string $content_service): ?self {
        $this->content_service = $content_service;
        return $this;
    }

    public function getIdAdmin(): ?int {
        return $this->id_admin;
    }

    public function setIdAdmin(int $id_admin): ?self {
        $this->id_admin = $id_admin;
        return $this;
    }

}