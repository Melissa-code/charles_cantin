<?php


class CategoryClass
{
    private $id_category;
    private $title_category;
    private $id_admin;

    public function __construct($id_category, $title_category, $id_admin) {
        $this->id_category = $id_category;
        $this->title_category = $title_category;
        $this->id_admin = $id_admin;
    }

    public function getIdCategory() {
        return $this->id_category;
    }

    public function getTitleCategory(){
        return $this->title_category;
    }

    public function setTitleCategory(string $title_category): self {
        $this->title_category = $title_category;
        return $this;
    }

    public function getIdAdmin() {
        return $this->id_admin;
    }

    public function setIdAdmin(int $id_admin) {
        $this->id_admin = $id_admin;
        return $this;
    }

}