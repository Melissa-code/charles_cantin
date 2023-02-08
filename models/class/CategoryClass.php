<?php

class CategoryClass {

    private ?int $id_category;
    private ?string $title_category;
    private ?int $id_admin;

    public function __construct(int $id_category, string $title_category, int $id_admin) {
        $this->id_category = $id_category;
        $this->title_category = $title_category;
        $this->id_admin = $id_admin;
    }

    public function getIdCategory(): ?int {
        return $this->id_category;
    }

    public function getTitleCategory(): ?string {
        return $this->title_category;
    }

    public function setTitleCategory(string $title_category): self {
        $this->title_category = $title_category;
        return $this;
    }

    public function getIdAdmin() : ?int {
        return $this->id_admin;
    }

    public function setIdAdmin(int $id_admin): self {
        $this->id_admin = $id_admin;
        return $this;
    }

}