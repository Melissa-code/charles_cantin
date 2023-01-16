<?php

require_once ("models/class/ModelClass.php");
require_once("models/class/AdminClass.php");

class HomeManager extends ModelClass
{
    private array $admins;

    public function addAdmin(AdminClass $admin): void {
        $this->admins[] = $admin;
    }

    public function getAdmins() : ?array {
        return $this->admins;
    }

    public function getAllAdminsDb(): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM admins");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($data as $admin) {
            $a = new AdminClass($admin['id_admin'], $admin['name_admin'], $admin['firstname_admin'], $admin['job_admin'], $admin['email_admin'], $admin['password_admin'], $admin['creation_admin'], $admin['secret_admin']);
            $this->addAdmin($a);
        }
    }

    public function getAdminById(string $id) {
        foreach ($this->admins as $admin) {
            if($admin->getId() === (int)$id) {
                return $admin;
            }
        }
        throw new Exception("Adminstrateur inconnu.");
    }


}