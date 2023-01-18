<?php


class AdminClass
{
    private int $id_admin;
    private string $name_admin;
    private string $firstname_admin;
    private string $job_admin;
    private string $email_admin;
    private string $password_admin;
    private string $creation_admin;
    private string $secret_admin;


    public function __construct(int $id_admin, string $name_admin, string $firstname_admin, string $job_admin, string $email_admin, string $password_admin, string $creation_admin, string $secret_admin) {
        $this->id_admin = $id_admin;
        $this->name_admin = $name_admin;
        $this->firstname_admin = $firstname_admin;
        $this->job_admin = $job_admin;
        $this->email_admin = $email_admin;
        $this->password_admin = $password_admin;
        $this->creation_admin = $creation_admin;
        $this->secret_admin = $secret_admin;
    }


    public function getIdAdmin(): ?int {
        return $this->id_admin;
    }

    public function getNameAdmin(): ?string {
        return $this->name_admin;
    }

    public function setNameAdmin(string $name_admin): self {
        $this->name_admin = $name_admin;
        return $this;
    }

    public function getFirstnameAdmin(): ?string {
        return $this->firstname_admin;
    }

    public function setFirstnameAdmin(string $firstname_admin): self {
        $this->firstname_admin = $firstname_admin;
        return $this;
    }

    public function getJobAdmin(): ?string {
        return $this->job_admin;
    }

    public function setJobAdmin(string $job_admin): self {
        $this->job_admin = $job_admin;
        return $this;
    }

    public function getEmailAdmin(): ?string {
        return $this->email_admin;
    }

    public function setEmailAdmin(string $email_admin): self {
        $this->email_admin = $email_admin;
        return $this;
    }

    public function getPasswordAdmin(): ?string {
        return $this->password_admin;
    }

    public function setPasswordAdmin(string $password_admin): self {
        $this->password_admin = $password_admin;
        return $this;
    }

    public function getCreationAdmin(): ?string {
        return $this->creation_admin;
    }

    public function setCreationAdmin(string $creation_admin): self {
        $this->creation_admin = $creation_admin;
        return $this;
    }

    public function getSecretAdmin(): ?string {
        return $this->secret_admin;
    }

    public function setSecretAdmin(string $secret_admin): self {
        $this->secret_admin = $secret_admin;
        return $this;
    }

}