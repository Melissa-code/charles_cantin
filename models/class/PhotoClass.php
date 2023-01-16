<?php


class PhotoClass
{
    private int $id_photo;
    private string $legend_photo;
    private string $image_photo;
    private int $id_admin;
    private int $id_category;

    public function __contruct($id_photo, $legend_photo, $image_photo, $id_admin, $id_category) {
        $this->id_photo = $id_photo;
        $this->legend_photo = $legend_photo;
        $this->image_photo = $image_photo;
        $this->id_admin = $id_admin;
        $this->id_category = $id_category;
    }

    public function getIdPhoto(): int {
        return $this->id_photo;
    }

    public function getLegendPhoto(): string {
        return $this->legend_photo;
    }

    public function setLegendPhoto(string $legend_photo): self {
        $this->legend_photo = $legend_photo;
        return $this;
    }

    public function getImagePhoto(): string
    {
        return $this->image_photo;
    }

    public function setImagePhoto(string $image_photo): self
    {
        $this->image_photo = $image_photo;
        return $this;
    }

    public function getIdAdmin(): int
    {
        return $this->id_admin;
    }

    public function setIdAdmin(int $id_admin): self
    {
        $this->id_admin = $id_admin;
        return $this;
    }

    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    public function setIdCategory(int $id_category): self
    {
        $this->id_category = $id_category;
        return $this;
    }

}