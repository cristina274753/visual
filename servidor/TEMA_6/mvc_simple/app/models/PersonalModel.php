<?php

namespace cristina\app\models;

use cristina\lib\Database; // <- Importante

class PersonalModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // crea conexión
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM personal";
        return $this->db->executeQuery($sql);
    }
}
